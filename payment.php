<?php
session_start();
include '../partials/header.php';

$cart = $_SESSION['cart'] ?? [];
$total = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['checkout'] = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'address' => $_POST['address'] ?? '',
    'delivery_option' => $_POST['delivery_option']
  ];
}

$cart = $_SESSION['cart'] ?? [];
$total = $_SESSION['total'] ?? 0;
$deliveryFee = ($_SESSION['checkout']['delivery_option'] ?? '') === 'Delivery' ? 3.00 : 0.00;
$grandTotal = $total + $deliveryFee;
?>

<style>
  body {
    font-family: 'Segoe UI', sans-serif;
    background: #f4f4f9;
    margin: 0;
    padding: 0;
  }

  .order-banner {
    background: linear-gradient(to right, #ff8a00, #e52e71);
    color: white;
    padding: 25px 40px;
    text-align: center;
    border-radius: 0 0 25px 25px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    position: relative;
    z-index: 2;
  }

  .order-banner h2 {
    margin: 0;
    font-size: 28px;
    letter-spacing: 1px;
  }

  .order-banner ul {
    list-style: none;
    margin-top: 15px;
    padding: 0;
    font-size: 16px;
  }

  .order-banner ul li {
    margin: 6px 0;
  }

  .order-banner .total {
    margin-top: 10px;
    font-size: 18px;
    font-weight: bold;
  }

  .payment-container {
    max-width: 600px;
    margin: -20px auto 60px auto;
    background: white;
    padding: 40px 30px;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    position: relative;
    top: 30px;
    z-index: 1;
  }

  .payment-container h3 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
  }

  .payment-container label {
    display: block;
    margin: 14px 0 6px;
    font-weight: 600;
    color: #555;
  }

  .payment-container input[type="text"],
  .payment-container input[type="email"],
  .payment-container select {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 15px;
    transition: all 0.3s ease;
    background: #fdfdfd;
  }

  .payment-container input:focus {
    border-color: #e52e71;
    box-shadow: 0 0 5px rgba(229, 46, 113, 0.3);
    outline: none;
  }

  .payment-container button {
    width: 100%;
    padding: 14px;
    background: linear-gradient(to right, #e52e71, #ff8a00);
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 10px;
    margin-top: 24px;
    cursor: pointer;
    transition: 0.3s ease;
  }

  .payment-container button:hover {
    background: linear-gradient(to right, #d02565, #e77e00);
  }

  .secure-note {
    font-size: 14px;
    color: green;
    margin-top: 12px;
    text-align: center;
  }
</style>

<!-- 🔶 Order Summary Banner -->
<div class="order-banner">
  <h2>🧾 Order Summary</h2>
  <ul>
    <?php foreach ($cart as $item): 
      $subtotal = $item['quantity'] * $item['price'];
      $total += $subtotal;
    ?>
      <li><?= (int)$item['quantity'] ?> x <?= htmlspecialchars($item['name']) ?> - $<?= number_format($subtotal, 2) ?></li>
    <?php endforeach; ?>
  </ul>
  <div class="total">Total: $<?= number_format($total, 2) ?></div>
</div>

<!-- 💳 Payment Form -->
<div class="payment-container">
  <h1>Payment Method</h1>

  <form action="../includes/place_order.php" method="post">
    <label>Select Payment Method:</label>
    <select name="payment_method" id="payment_method" required onchange="toggleCardFields(this.value)">
      <option value="Cash">Cash</option>
      <option value="paypal">Paypal</option>
      <option value="Credit Card">Credit Card</option>
    </select>

    <div id="cardFields" style="display: none; margin-top: 15px;">
      <input type="text" name="card_number" placeholder="Card Number" pattern="\d{16}" maxlength="16"><br><br>
      <input type="text" name="expiry_date" placeholder="MM/YY" pattern="\d{2}/\d{2}" maxlength="5"><br><br>
      <input type="text" name="cvc" placeholder="CVC" pattern="\d{3}" maxlength="3"><br>
    </div>

    <input type="hidden" name="name" value="<?= htmlspecialchars($_SESSION['checkout']['name']) ?>">
    <input type="hidden" name="email" value="<?= htmlspecialchars($_SESSION['checkout']['email']) ?>">
    <input type="hidden" name="phone" value="<?= htmlspecialchars($_SESSION['checkout']['phone']) ?>">
    <input type="hidden" name="address" value="<?= htmlspecialchars($_SESSION['checkout']['address']) ?>">
    <input type="hidden" name="delivery_option" value="<?= htmlspecialchars($_SESSION['checkout']['delivery_option']) ?>">
    <input type="hidden" name="original_total" value="<?= $total ?>">

    

    <button type="submit">Place Order</button>
  </form>
</div>

<script>
function toggleCardFields(value) {
  const cardDiv = document.getElementById('cardFields');
  cardDiv.style.display = (value === 'paypal' || value === 'Credit Card') ? 'block' : 'none';
}
</script>
</div>