<?php
session_start();

if (!isset($_POST['index'], $_POST['action'])) {
  header("Location: cart.php");
  exit;
}

$index  = (int)$_POST['index'];
$action = $_POST['action'];

// make sure the item exists
if (isset($_SESSION['cart'][$index])) {
  if ($action === 'update' && isset($_POST['quantity'])) {
    // sanitize quantity
    $qty = max(1, (int)$_POST['quantity']);
    $_SESSION['cart'][$index]['quantity'] = $qty;
  }
  elseif ($action === 'delete') {
    // remove the item
    array_splice($_SESSION['cart'], $index, 1);
  }
}

// go back to cart
header("Location: cart.php");
exit;
