<?php
session_start();
include '../partials/header.php';

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<link rel="stylesheet" href="../css/style.css">

<div class="cart-page">
  <h1>Your Cart</h1>

  <?php if (empty($cart)): ?>
    <p>Your cart is empty.</p>
  <?php else: ?>
    <table class="cart-table">
      <thead>
        <tr>
          <th>Item</th>
          <th>Qty</th>
          <th>Type</th>
          <th>Unit Price</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cart as $item): 
          $subtotal = $item['quantity'] * $item['price'];
          $total += $subtotal;
        ?>
          <tr>
            <td><?= htmlspecialchars($item['name']) ?></td>
            <td><?= (int)$item['quantity'] ?></td>
            <td><?= htmlspecialchars($item['type']) ?></td>
            <td>$<?= number_format($item['price'], 2) ?></td>
            <td>$<?= number_format($subtotal, 2) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <h3>Total: $<?= number_format($total, 2) ?></h3>

    <div class="cart-actions">
      <a href="checkout.php" class="btn">Proceed to Checkout</a>
    </div>
  <?php endif; ?>
</div>

<script src="../js/cart.js"></script>
<?php include '../partials/footer.php'; ?>
