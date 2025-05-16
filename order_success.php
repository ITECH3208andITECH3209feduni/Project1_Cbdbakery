<?php
session_start();
$_SESSION['cart'] = []; // Clear cart
include '../partials/header.php';
?>

<div class="order-success">
  <h1>Thank you for your order!</h1>
  <p>Your order has been placed successfully. You'll receive a confirmation email shortly.</p>
  <a href="menu.php" class="btn">Back to Menu</a>
</div>
<script src="../js/cart.js"></script>

<?php include '../partials/footer.php'; ?>
