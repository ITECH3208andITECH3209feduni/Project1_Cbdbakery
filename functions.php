<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function dbConnect() {
    $host = 'localhost';
    $user = 'root';
    $password = ''; // default for XAMPP
    $database = 'bakery_db';

    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die("❌ Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function getProducts() {
    $conn = dbConnect();
    $products = [];

    $result = $conn->query("SELECT * FROM products");
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    $conn->close();
    return $products;
}

function addToCart($id, $name, $price, $quantity = 1) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$id] = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ];
    }
}

function getCartItems() {
    return $_SESSION['cart'] ?? [];
}

function clearCart() {
    unset($_SESSION['cart']);
}
?>
