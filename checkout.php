<?php
session_start();
include '../partials/header.php';

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<link rel="stylesheet" href="../css/style.css">

<div class="checkout-page">
  <h1>Checkout</h1>

  <?php if (empty($cart)): ?>
    <p>Your cart is empty.</p>
  <?php else: ?>
    <form action="../includes/place_order.php" method="post" class="checkout-form">
      <h3>Customer Details</h3>
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="tel" name="phone" placeholder="Phone" required>
      <textarea name="address" placeholder="Full Address" required></textarea>

      <h3>Order Summary</h3>
      <ul class="order-summary">
        <?php foreach ($cart as $item): 
          $subtotal = $item['quantity'] * $item['price'];
          $total += $subtotal;
        ?>
          <li><?= (int)$item['quantity'] ?> x <?= htmlspecialchars($item['name']) ?> (<?= htmlspecialchars($item['type']) ?>) - $<?= number_format($subtotal, 2) ?></li>
        <?php endforeach; ?>
      </ul>

      <p class="total-price"><strong>Total: $<?= number_format($total, 2) ?></strong></p>

      <label for="payment_method">Select Payment Method:</label>
      <select name="payment_method" id="payment_method" required>
        <option value="cod">Cash on Delivery</option>
        <option value="paypal">PayPal</option>
        <option value="card">Card</option>
      </select>

      <button type="submit" class="btn">Place Order</button>
    </form>
  <?php endif; ?>
</div>

<script src="../js/cart.js"></script>
<?php include '../partials/footer.php'; ?>
