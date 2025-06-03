<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require('../includes/functions.php');
include('../partials/header.php');

$conn = dbConnect();

// Handle Add to Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product'], $_POST['price'], $_POST['type'], $_POST['quantity'])) {
    $item = [
        'name'     => $_POST['product'],
        'price'    => (float)$_POST['price'],
        'type'     => $_POST['type'],
        'quantity' => (int)$_POST['quantity']
    ];

    $_SESSION['cart'][] = $item;
    header("Location: cart.php");
    exit;
}

// Fetch products grouped by category
$productsByCategory = [];
$result = $conn->query("SELECT * FROM products ORDER BY category, name");

while ($row = $result->fetch_assoc()) {
    $category = $row['category'];
    $productsByCategory[$category][] = $row;
}
?>

<link rel="stylesheet" href="../css/style.css">

<div class="menu-page" style="text-align: center; font-family: 'Georgia', serif;">
  <h1>Our Menu</h1>
  <br><br>

  <?php foreach ($productsByCategory as $category => $items): ?> <br>
    <h2 class="menu-category"><?= htmlspecialchars($category) ?></h2> <br>
    <div class="menu-grid"><br>
      <?php foreach ($items as $item): ?>
        <div class="menu-item">
          <a href="product_detail.php?id=<?= $item['id'] ?>">
            <img src="../images/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
          </a>

          <h3>
            <a href="product_detail.php?id=<?= $item['id'] ?>">
              <?= htmlspecialchars($item['name']) ?>
            </a>
          </h3>

          <?php if (!empty($item['description'])): ?>
           
          <?php endif; ?>
          

          <form method="post">
            <input type="hidden" name="product" value="<?= htmlspecialchars($item['name']) ?>">
          </form>
          <br>

          <?php if (!empty($item['dozen_price'])): ?>
            <p><strong>Dozen: $<?= number_format($item['dozen_price'], 2) ?></strong></p>
            <form method="post">
              <input type="hidden" name="product" value="<?= htmlspecialchars($item['name']) ?>">
              <input type="hidden" name="price" value="<?= $item['dozen_price'] ?>">
              <input type="hidden" name="type" value="Dozen">
              <input type="number" name="quantity" value="1" min="1" class="qty-box">
              <button type="submit" class="add-btn">Add Dozen</button>
            </form>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>
<br><br>

<?php include('../partials/footer.php'); ?>
