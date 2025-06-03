<?php
session_start();
include '../partials/header.php';

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<link rel="stylesheet" href="../css/style1.css">

<div class="cart-page">
  <h1>Your Cart</h1>

  <?php if (empty($cart)): ?>
    <p style="text-align: center;font-weight: bold;">Your cart is empty.</p>
  <?php else: ?>
    <table class="cart-table">
      <thead>
        <tr>
          <th>Item</th>
          <th>Qty</th>
          <th>Type</th>
          <th>Unit Price</th>
          <th>Subtotal</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cart as $index => $item):
          $subtotal = $item['quantity'] * $item['price'];
          $total += $subtotal;
        ?>
        <tr>
          <form action="update_cart.php" method="post">
            <!-- send which item in the array -->
            <input type="hidden" name="index" value="<?= $index ?>">
            <td><?= htmlspecialchars($item['name']) ?></td>
            <td>
              <input
                type="number"
                name="quantity"
                value="<?= (int)$item['quantity'] ?>"
                min="1"
                style="width: 90px;"
              >
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Icon delete button -->
<button type="submit" name="action" value="delete" class="delete-btn" title="Remove Item">
  <i class="fas fa-trash"></i>
</button>

            </td>
            <td><?= htmlspecialchars($item['type']) ?></td>
            <td>$<?= number_format($item['price'], 2) ?></td>
            <td>$<?= number_format($subtotal, 2) ?></td>
            <td>
              <button type="submit" name="action" value="update" class="btn">Update</button>
            </td>
          </form>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <h3>Total: $<?= number_format($total, 2) ?></h3>

        <div class="cart-actions">
      <a href="menu.php" class="btn btn--more">Continue Shopping</a>
      <a href="checkout.php" class="btn btn--checkout">Proceed to Checkout</a>
    </div>


  <?php endif; ?>
</div>

<script src="../js/cart.js"></script>
<?php include '../partials/footer.php'; ?>
