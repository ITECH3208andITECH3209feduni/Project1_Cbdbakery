<?php
session_start();
$_SESSION['cart'] = []; // Clear cart
include '../partials/header.php';
?>

<style>
  body {
    margin: 0;
    font-family: 'Segoe UI', Roboto, sans-serif;
    background: linear-gradient(to right, #f9f9f9, #eef2f3);
    color: #333;
  }

  .order-success {
    max-width: 600px;
    margin: 100px auto;
    background: white;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    text-align: center;
    animation: fadeIn 0.6s ease-out;
  }

  .order-success h1 {
    color: #2ecc71;
    font-size: 2.2rem;
    margin-bottom: 15px;
  }

  .order-success p {
    font-size: 1.1rem;
    margin-bottom: 30px;
    color: #555;
  }

  .order-success .btn {
    display: inline-block;
    background: #e74c3c;
    color: white;
    text-decoration: none;
    padding: 12px 28px;
    font-size: 1rem;
    border-radius: 8px;
    transition: background 0.3s ease;
  }

  .order-success .btn:hover {
    background: #c0392b;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @media (max-width: 640px) {
    .order-success {
      margin: 50px 20px;
      padding: 30px 20px;
    }

    .order-success h1 {
      font-size: 1.8rem;
    }

    .order-success .btn {
      padding: 10px 20px;
    }
  }
</style>

<div class="order-success">
  <h1>🎉 Thank you for your order!</h1>
  <p>Your order has been placed successfully. You'll receive a confirmation email shortly.</p>
  <a href="menu.php" class="btn">🍽️ Back to Menu</a>
</div>

<script src="../js/cart.js"></script>

<?php include '../partials/footer.php'; ?>
