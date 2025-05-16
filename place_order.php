<?php
session_start();
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $address = $_POST['address'];
    $payment = $_POST['payment_method'];

    $cart = $_SESSION['cart'] ?? [];

    if (!$cart) {
        die('Cart is empty.');
    }

    $db = dbConnect();

    // Insert order
    $stmt = $db->prepare("INSERT INTO orders (customer_name, address, phone, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $address, $phone, $email]);
    $orderId = $db->lastInsertId();

    // Insert items
    $totalAmount = 0;
    foreach ($cart as $item) {
        $subtotal = $item['price'] * $item['quantity'];
        $totalAmount += $subtotal;

        $stmt = $db->prepare("INSERT INTO order_items (order_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$orderId, $item['name'] . " ({$item['type']})", $item['quantity'], $item['price']]);
    }

    // Insert payment
    $stmt = $db->prepare("INSERT INTO payments (order_id, method, amount) VALUES (?, ?, ?)");
    $stmt->execute([$orderId, $payment, $totalAmount]);

    $_SESSION['cart'] = []; // Clear cart

    header("Location: ../pages/order_success.php?order_id=" . $orderId);
    exit;
}
?>
