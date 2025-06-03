<?php
session_start();
require_once '../includes/functions.php';
include_once '../partials/header.php';

$conn = dbConnect();

// Get product ID from URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch product from database
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    echo "<p>Product not found.</p>";
    include_once '../partials/footer.php';
    exit;
}

// Handle Add to Cart from this page
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['price'], $_POST['type'], $_POST['quantity'])) {
    $item = [
        'name'     => $product['name'],
        'price'    => (float)$_POST['price'],
        'type'     => $_POST['type'],
        'quantity' => (int)$_POST['quantity']
    ];

    $_SESSION['cart'][] = $item;
    header("Location: cart.php");
    exit;
}
?>

<link rel="stylesheet" href="../css/style.css">
<style>
 

.product-detail-container {
  max-width: 900px;
  margin: 40px auto;
  padding: 20px;
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
  background-color: #fff;
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.product-image {
  flex: 1 1 300px;
  text-align: center;
}

.product-image img {
  max-width: 100%;
  height: auto;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.product-info {
  flex: 1 1 300px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.product-info h1 {
  font-size: 26px;
  margin-bottom: 10px;
}

.product-info .price {
  font-size: 20px;
  font-weight: bold;
  color: #2c3e50;
  margin-bottom: 15px;
}

.product-description {
  list-style-type: disc;
  padding-left: 20px;
  margin-bottom: 20px;
}

.product-description li {
  margin-bottom: 6px;
  color: #444;
}

.add-to-cart-form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.qty-input {
  width: 60px;
  padding: 6px;
  margin-left: 10px;
  border-radius: 6px;
  border: 1px solid #ccc;
}

.quantity-price {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.add-btn {
  background-color: #27ae60;
  color: #fff;
  padding: 10px 15px;
  font-size: 16px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.add-btn:hover {
  background-color: #219150;
}

/* Responsive layout */
@media (max-width: 768px) {
  .product-detail-container {
    flex-direction: column;
    align-items: center;
  }

  .product-image, .product-info {
    flex: 1 1 100%;
    text-align: center;
  }

  .quantity-price {
    align-items: center;
  }
}

</style>
<div class="product-detail-container">
  <div class="product-image">
    <img src="../images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
  </div>

  <div class="product-info">
    <h1>
  <?= htmlspecialchars($product['name']) ?>
  <?php if ($product['stock'] == 0): ?>
    <span style="color:red; font-size: 18px;">[ Item out of stock ]</span>
  <?php elseif ($product['stock'] <= 10): ?>
    <span style="color:orange; font-size: 18px;">[ <?= $product['stock'] ?> left ]</span>
  <?php endif; ?>
</h1>



    <p class="price">$<?= number_format($product['each_price'], 2) ?></p>

    <ul class="product-description">
      <?php foreach (explode("\n", $product['description']) as $line): ?>
        <li><?= htmlspecialchars($line) ?></li>
      <?php endforeach; ?>
    </ul>

    

    <form method="post" class="add-to-cart-form">
      <input type="hidden" name="price" value="<?= $product['each_price'] ?>">
      <input type="hidden" name="type" value="Each">


      <div class="quantity-price">
        <div>
          <p><strong>Product Price: </strong> $<?= number_format($product['each_price'], 2) ?> 
            <input type="number" name="quantity" value="1" min="1" class="qty-input">
          </p>
        </div>
        <div><strong>Total:</strong> $<?= number_format($product['each_price'], 2) ?></div>
      </div>

      <button type="submit" class="add-btn">Add to Cart</button>
    </form>
  </div>
</div>


<?php include_once '../partials/footer.php'; ?>
