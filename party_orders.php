<?php
session_start();
require('../includes/functions.php');
include('../partials/header.php');

$conn = dbConnect();
// Handle "Add Dozen" form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product'], $_POST['price'], $_POST['quantity'], $_POST['type'])) {
    $product = $_POST['product'];
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);
    $type = $_POST['type'];

    $item = [
        'name' => $product,
        'price' => $price,
        'quantity' => $quantity,
        'type' => $type
    ];

    // Initialize cart
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if item exists in cart
    $found = false;
    foreach ($_SESSION['cart'] as &$cartItem) {
        if ($cartItem['name'] === $product && $cartItem['type'] === $type) {
            $cartItem['quantity'] += $quantity;
            $found = true;
            break;
        }
    }
    unset($cartItem); // break reference

    if (!$found) {
        $_SESSION['cart'][] = $item;
    }

    // Optional: Redirect to avoid form resubmission
    header("Location: cart.php");

    exit;
}

$category = 'Party Order';

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
            <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
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
</div><br><br>
<?php include('../partials/footer.php'); ?>
