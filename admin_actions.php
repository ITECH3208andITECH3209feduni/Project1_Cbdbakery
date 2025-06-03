<?php
require_once 'functions.php';
$conn = dbConnect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ➕ Add new staff
    if (isset($_POST['add_staff'])) {
        $stmt = $conn->prepare("INSERT INTO staff (name, role, email, contact) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $_POST['name'], $_POST['role'], $_POST['email'], $_POST['contact']);
        $stmt->execute();
    }

    // ✏️ Edit staff
    if (isset($_POST['edit_staff'])) {
        $stmt = $conn->prepare("UPDATE staff SET name=?, role=?, email=?, contact=? WHERE id=?");
        $stmt->bind_param("ssssi", $_POST['name'], $_POST['role'], $_POST['email'], $_POST['contact'], $_POST['id']);
        $stmt->execute();
    }

    // ❌ Delete staff
    if (isset($_POST['delete_staff'])) {
        $stmt = $conn->prepare("DELETE FROM staff WHERE id=?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
    }

    // ➕ Add product with image and description
    if (isset($_POST['add_product'])) {
        $name = $_POST['name']; 
        $category = $_POST['category'];
        $eachPrice = $_POST['price_each'];
        $dozenPrice = $_POST['price_dozen'] ?: null;
        $description = $_POST['description'];

        // Handle image upload
        $imageName = '';
        if (!empty($_FILES['img']['name'])) {
            $targetDir = "../images/";
            $imageName = basename($_FILES['img']['name']);
            $targetFile = $targetDir . $imageName;
            move_uploaded_file($_FILES['img']['tmp_name'], $targetFile);
        }

        $stmt = $conn->prepare("INSERT INTO products (name, category, each_price, dozen_price, image, description) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssddss", $name, $category, $eachPrice, $dozenPrice, $imageName, $description);
        $stmt->execute();
    }

    // ❌ Delete product
    if (isset($_POST['delete_product']) && !empty($_POST['delete_product_id'])) {
        $productId = $_POST['delete_product_id'];
        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
    }

    // ✏️ Update product price
    // ✏️ Update product price and stock
if (isset($_POST['update_product']) && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    $stock = intval($_POST['stock']);
    $price = floatval($_POST['new_price']);

    $stmt = $conn->prepare("UPDATE products SET stock = ?, each_price = ? WHERE id = ?");
    $stmt->bind_param("idi", $stock, $price, $productId);
    $stmt->execute();
}




    // 📁 Bulk product upload via CSV
    if (isset($_POST['upload_csv']) && isset($_FILES['product_csv'])) {
        $file = fopen($_FILES['product_csv']['tmp_name'], 'r');
        while (($data = fgetcsv($file)) !== false) {
            // CSV Columns: name, category, each_price, dozen_price, image, description
            if (count($data) === 6) {
                $stmt = $conn->prepare("INSERT INTO products (name, category, each_price, dozen_price, image, description) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssddss", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
                $stmt->execute();
            }
        }
        fclose($file);
    }

   
require_once 'functions.php';
require_once 'email_helper.php';
require_once 'send_email.php';

$conn = dbConnect();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'], $_POST['order_id'])) {
    $orderId = intval($_POST['order_id']);
    $action = $_POST['action'];

    if ($action === 'accept') {
        $status = 'Accepted';
        $subject = " Your Order #$orderId has been Accepted!";
        $message = "Your order has been accepted and is now being processed. Thank you for choosing CBD Bakery!";
    } elseif ($action === 'reject') {
        $status = 'Rejected';
        $subject = " Your Order #$orderId has been Rejected";
        $message = "We're sorry to inform you that your order has been rejected as the item you requested is currently out of stock. Please feel free to contact us if you need assistance or wish to place an alternative order.";
    } else {
        die("Invalid action.");
    }

    // Update status in orders table
    $stmt = $conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
    if (!$stmt) {
        die("Status update failed: " . $conn->error);
    }
    $stmt->bind_param("si", $status, $orderId);
    $stmt->execute();

    // Fetch customer email
    $result = $conn->prepare("SELECT email, customer_name FROM orders WHERE id = ?");
    $result->bind_param("i", $orderId);
    $result->execute();
    $result->bind_result($email, $name);
    $result->fetch();

    // Send email notification
    sendCustomerEmail($email, $subject, "Hi $name,

$message

— CBD Bakery");

    // Redirect back to admin page
    header("Location: ../pages/admin.php");
    exit;
}




    // ✉️ Reply to contact message
if (isset($_POST['reply_contact'])) {
    $to = $_POST['reply_email'];
    $message = $_POST['reply_message'];
    $customerName = $_POST['reply_name'] ?? 'Customer'; // Optional name if available
    $subject = "CBD Bakery: Reply to Your Message";

    $body = "
        <h2>Hi {$customerName},</h2>
        <p>Thank you for contacting CBD Bakery.</p>
        <p>Here is our response to your query:</p>
        <blockquote>{$message}</blockquote>
        <p>Let us know if you need any more help!</p>
        <p><strong>CBD Bakery Team</strong></p>
    ";

    sendCustomerEmail($to, $subject, $body);
}
header("Location: ../pages/admin.php");
    exit;
}
?>
