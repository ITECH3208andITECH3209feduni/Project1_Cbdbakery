<?php
session_start();
require('../includes/functions.php');
include('../partials/header.php');

$conn = dbConnect();
$category = 'Pies';

$result = $conn->prepare("SELECT * FROM products WHERE category = ? ORDER BY name");
$result->bind_param("s", $category);
$result->execute();
$items = $result->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<link rel="stylesheet" href="../css/style.css">
<div class="menu-page" style="text-align: center;">
  <h1><?= htmlspecialchars($category) ?></h1><br>
  <div class="menu-grid">
    <?php foreach ($items as $item): ?>
      <div class="menu-item">
        <a href="product_detail.php?id=<?= $item['id'] ?>">
          <img src="../images/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
        </a>
        <h3>
          <a href="product_detail.php?id=<?= $item['id'] ?>"><?= htmlspecialchars($item['name']) ?></a>
        </h3>
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
</div>
<br><br>
<?php include('../partials/footer.php'); ?>
