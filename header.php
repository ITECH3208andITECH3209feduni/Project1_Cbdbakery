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
  <!-- Link to CSS relative to site root -->
</head>
<style>
/* Basic Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', sans-serif;
}

.main-header {
  background-color: #000;
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 5px 10px;
  position: sticky;
  top: 0;
  z-index: 1000;
}

.logo-container {
  height: 100px; /* Fixed height of header logo area */
  width: auto;
  display: flex;
  align-items: center;
}

.logo {
  height: auto;
  max-height: 165px; /* Visually big but won’t push header height */
  transform: scale(1.5); /* Make the logo appear bigger */
  transform-origin: left center;
}


.nav-links {
  display: flex;
  align-items: center;
  gap: 30px;
}

.nav-links a {
  color: #fff;
  text-decoration: none;
  font-size: 21px;
  position: relative;
  font-family:  'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

/* Container */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Button */
.dropbtn {
  background: transparent;
  color: #fff;
  padding: 16px;
  font-size: 16px;
  border: none;
  font-weight: 500;
  cursor: pointer;
  transition: color 0.3s ease;
}

/* Dropdown Content Box */
.dropdown-content {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background-color: #fff;
  min-width: 220px;
  padding: 8px 0;
  border-radius: 6px;
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
  z-index: 1000;
}

/* Dropdown Links */
.dropdown-content a {
  color: #333;
  padding: 12px 20px;
  text-decoration: none;
  display: block;
  font-size: 15px;
  font-weight: 500;
  transition: background 0.3s ease, color 0.3s ease;
}

/* Hover effect on links */
.dropdown-content a:hover {
  background-color: #f8f8f8;
  color: #c0392b;
}

/* Show dropdown on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Optional arrow under button */
.dropdown::after {
  content: '';
  position: absolute;
  top: 100%;
  left: 20px;
  width: 0;
  height: 0;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-top: 6px solid #fff;
  display: none;
}

.dropdown:hover::after {
  display: block;
}

.right-buttons {
  display: flex;
  align-items: center;
  gap: 15px;
}

.cart-icon {
  font-size: 25px;
  color: #fff;
  text-decoration: none;
}

.call-button {
  padding: 8px 14px;
  border: 1px solid #fff;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
}

.enquire-button {
  padding: 8px 16px;
  background-color: #b27648;
  color: #fff;
  border: none;
  text-decoration: none;
  border-radius: 4px;
  font-weight: bold;
}




  </style>
<body>

<header class="main-header">
  <div class="logo-container">
    <a href="/cbd-bakery-php/pages/index.php">
    <img src="/cbd-bakery-php/images/logo3.png" alt="CBD Bakery Logo" class="logo">
  </a>
  </div>
  <nav class="nav-links">
    <a href="/cbd-bakery-php/pages/index.php">Home</a>
    <div class="dropdown">
      <a href="/cbd-bakery-php/pages/menu.php" class="dropbtn">Menu</a>
      <div class="dropdown-content" style="text-align:center; ">
        <a href="/cbd-bakery-php/pages/pies.php">Pies</a>
        <a href="/cbd-bakery-php/pages/donuts.php">Donuts</a>
        <a href="/cbd-bakery-php/pages/party_orders.php">Party Orders</a>
        <a href="/cbd-bakery-php/pages/breakfast.php">Breakfast</a>
        <a href="/cbd-bakery-php/pages/cake.php">Cakes & Slices</a>
      </div>
    </div>
    <a href="/cbd-bakery-php/pages/about.php">About</a>
    <a href="/cbd-bakery-php/pages/contact.php">Contact</a>
    
  </nav>
  <div class="right-buttons">
 <a href="/cbd-bakery-php/pages/cart.php" class="cart-icon">🛒(<?= $cartCount ?>)</a> 
</a>

    <a href="tel:0396702640" class="call-button">📞 (03) 96702640</a>
  </div>
</header>




<script src="/cbd-bakery-php/js/cart.js"></script>

</body>