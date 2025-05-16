<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CBD Bakery</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Link to CSS relative to root directory -->
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
  <div class="navbar">
    
  
    <nav>
    <a>
      <img src="pics/logo1.png" alt="Coffee Shop Logo" class="" style="width: 350px; height:350px;  margin-left: -700px;">
    </a>
      <a href="index.php">Home</a>
      <a href="menu.php">Menu</a>
      <a href="contact.php">Contact</a>
      <a href="login.php">Admin</a>
      <a href="cart.php">Cart (<?= $cartCount ?>)</a>
    </nav>
  </div>
</header>
  <script src="/js/cart.js"></script>
