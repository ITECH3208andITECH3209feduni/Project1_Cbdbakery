<?php
require_once 'admin_protect.php';
require_once 'functions.php';

$conn = dbConnect();

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="products_export.csv"');

$output = fopen('php://output', 'w');

// Column headers
fputcsv($output, ['ID', 'Name', 'Category', 'Stock', 'Each Price', 'Dozen Price', 'Description']);

// Fetch products from DB
$result = $conn->query("SELECT * FROM products ORDER BY id ASC");
while ($row = $result->fetch_assoc()) {
    fputcsv($output, [
        $row['id'],
        $row['name'],
        $row['category'],
        $row['stock'],
        $row['each_price'],
        $row['dozen_price'],
        $row['description']
    ]);
}

fclose($output);
exit;
