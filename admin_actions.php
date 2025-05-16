<?php
require_once 'functions.php';
$conn = dbConnect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add new staff
    if (isset($_POST['add_staff'])) {
        $stmt = $conn->prepare("INSERT INTO staff (name, role, email, contact) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $_POST['name'], $_POST['role'], $_POST['email'], $_POST['contact']);
        $stmt->execute();
    }

    // Edit staff
    if (isset($_POST['edit_staff'])) {
        $stmt = $conn->prepare("UPDATE staff SET name=?, role=?, email=?, contact=? WHERE id=?");
        $stmt->bind_param("ssssi", $_POST['name'], $_POST['role'], $_POST['email'], $_POST['contact'], $_POST['id']);
        $stmt->execute();
    }

    // Delete staff
    if (isset($_POST['delete_staff'])) {
        $stmt = $conn->prepare("DELETE FROM staff WHERE id=?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
    }

    // Add product with image and description
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

    // Delete product
    if (isset($_POST['delete_product']) && !empty($_POST['delete_product_id'])) {
        $productId = $_POST['delete_product_id'];
        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
    }

    header('Location: ../pages/admin.php');
    exit();
}
