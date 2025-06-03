<?php
session_start();
require('../includes/functions.php');
include('../partials/header.php');

$conn = dbConnect();
$category = 'Cakes and Slices';

// Pagination settings
$limit = 14; // 3 rows * 4 items (adjust based on your CSS layout)
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Get total number of products in this category
$countStmt = $conn->prepare("SELECT COUNT(*) FROM products WHERE category = ?");
$countStmt->bind_param("s", $category);
$countStmt->execute();
$countStmt->bind_result($totalItems);
$countStmt->fetch();
$countStmt->close();

$totalPages = ceil($totalItems / $limit);

// Get products for current page
$result = $conn->prepare("SELECT * FROM products WHERE category = ? ORDER BY name LIMIT ? OFFSET ?");
$result->bind_param("sii", $category, $limit, $offset);
$result->execute();
$items = $result->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<link rel="stylesheet" href="../css/style.css">
<div class="menu-page" style="text-align: center;">
  <h1><?= htmlspecialchars($category) ?></h1> <br>
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

  <br><br>
  <!-- Pagination Controls -->
  <div class="pagination" style="font-size: 20px; text-align: center; font-weight: bold;">
    <?php if ($page > 1): ?>
      <a href="?page=<?= $page - 1 ?>">&laquo; Previous</a>
    <?php endif; ?>
    
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <a href="?page=<?= $i ?>" <?= $i === $page ? 'class="active"' : '' ?>><?= $i ?></a>
    <?php endfor; ?>
    
    <?php if ($page < $totalPages): ?>
      <a href="?page=<?= $page + 1 ?>">Next &raquo;</a>
    <?php endif; ?>
  </div>
</div>
<br><br>
<?php include('../partials/footer.php'); ?>
