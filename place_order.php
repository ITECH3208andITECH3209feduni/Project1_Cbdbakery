<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'functions.php';
require_once 'email_helper.php';
require_once 'send_email.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $phone    = trim($_POST['phone'] ?? '');
    $address  = trim($_POST['address'] ?? '');
    $payment  = $_POST['payment_method'] ?? '';
    $delivery = $_POST['delivery_option'] ?? '';
    $baseTotal = isset($_POST['original_total']) ? floatval($_POST['original_total']) : 0;

    $deliveryFee = ($delivery === 'Delivery') ? 3.00 : 0.00;
    $totalAmount = $baseTotal + $deliveryFee;

    $cart = $_SESSION['cart'] ?? [];

    if (empty($cart)) {
        die('🛒 Cart is empty.');
    }

    $conn = dbConnect();

    // Save Order
    $stmt = $conn->prepare("INSERT INTO orders (customer_name, email, phone, address, delivery_method) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("❌ Order insert failed: " . $conn->error);
    }
    $stmt->bind_param("sssss", $name, $email, $phone, $address, $delivery);
    $stmt->execute();
    $orderId = $conn->insert_id;

    // Save Items
    foreach ($cart as $item) {
        $productName = $item['name'] . " ({$item['type']})";
        $quantity = $item['quantity'];
        $price = $item['price'];

        $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            die("❌ Item insert failed: " . $conn->error);
        }
        $stmt->bind_param("isid", $orderId, $productName, $quantity, $price);
        $stmt->execute();
    }

    // Save Payment
    $stmt = $conn->prepare("INSERT INTO payments (order_id, method, amount) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("❌ Payment insert failed: " . $conn->error);
    }
    $stmt->bind_param("isd", $orderId, $payment, $totalAmount);
    $stmt->execute();

    // Send Email
    $subject = "Your Order with CBD Bakery (Order #$orderId)";
    $message = buildCustomerEmail($name, $orderId, $cart, $totalAmount, $delivery);
    sendCustomerEmail($email, $subject, $message);

    unset($_SESSION['cart']);
    header("Location: ../pages/order_success.php?order_id=$orderId&delivery=" . urlencode($delivery));
    exit;
}
?>