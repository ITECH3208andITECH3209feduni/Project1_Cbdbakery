<?php
include('../partials/header.php');
require('../includes/functions.php');
require('../db/db_init.php');

$db = dbConnect();

// Handle Add to Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product'], $_POST['price'], $_POST['type'], $_POST['quantity'])) {
    $item = [
        'name'     => $_POST['product'],
        'price'    => (float)$_POST['price'],
        'type'     => $_POST['type'],
        'quantity' => (int)$_POST['quantity']
    ];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = $item;
    header("Location: cart.php");
    exit;
}

$menu = [
  "Party Food" => [
    ["name" => "Party Sausage Roll", "each" => 3.60, "dozen" => 30.00, "img" => "Brownie.jpg"],
    ["name" => "Party Pies", "each" => 3.60, "dozen" => 32.00, "img" => "Muffin.jpg"],
    ["name" => "Party Quiche Lorraine", "each" => 3.60, "dozen" => 32.00, "img" => "Brownie.jpg"],
    ["name" => "Vegan Party Pastie (vg)", "each" => 4.00, "dozen" => 40.00, "img" => "Muffin.jpg"],
    ["name" => "Party Quiche Vegetable", "each" => 3.60, "dozen" => 32.00, "img" => "Brownie.jpg"],
    ["name" => "Gluten Free Party Pie (gf)", "each" => 4.00, "dozen" => 40.00, "img" => "Muffin.jpg"],
    ["name" => "Party Spinach & Cheese Filo (v)", "each" => 3.60, "dozen" => 32.00, "img" => "Brownie.jpg"],
    ["name" => "Gluten Free Vegetable Roll (gf)", "each" => 4.00, "dozen" => 40.00, "img" => "Muffin.jpg"]
  ],
  "Pies" => [
    ["name" => "Plain Pie", "each" => 7.40, "img" => "CheeseBaconPie.jpg"],
    ["name" => "Mushroom Pie", "each" => 7.70, "img" => "Brownie.jpg"],
    ["name" => "Steak & Onion Pie", "each" => 7.70, "img" => "Muffin.jpg"],
    ["name" => "Pepper Steak Pie", "each" => 8.40, "img" => "CheeseBaconPie.jpg"],
    ["name" => "Chicken & Leek Pie", "each" => 8.40, "img" => "Brownie.jpg"],
    ["name" => "Cornish Pastie", "each" => 7.70, "img" => "Muffin.jpg"],
    ["name" => "Quiche Lorraine", "each" => 7.50, "img" => "CheeseBaconPie.jpg"],
    ["name" => "Sausage Roll", "each" => 6.20, "img" => "Brownie.jpg"],
    ["name" => "Cheese & Bacon Pie", "each" => 7.70, "img" => "Muffin.jpg"],
    ["name" => "Curry Pie", "each" => 7.70, "img" => "CheeseBaconPie.jpg"],
    ["name" => "Cheese & Spinach Filo (v)", "each" => 7.70, "img" => "Brownie.jpg"],
    ["name" => "Vegetable Pastie (vg)", "each" => 7.50, "img" => "Muffin.jpg"],
    ["name" => "Vegetable Quiche (v)", "each" => 7.50, "img" => "CheeseBaconPie.jpg"]
  ],
  "Hot Breakfast" => [
    ["name" => "Fruit Toast", "each" => 6.00, "img" => "Brownie.jpg"],
    ["name" => "Ham & Cheese Croissant", "each" => 8.50, "img" => "Muffin.jpg"],
    ["name" => "Ham, Cheese, Tomato Toastie", "each" => 8.20, "img" => "CheeseBaconPie.jpg"],
    ["name" => "Double Egg & Bacon Roll", "each" => 13.50, "img" => "Brownie.jpg"],
    ["name" => "Banana Bread", "each" => 6.00, "img" => "Muffin.jpg"],
    ["name" => "Cheese & Tomato Croissant (v)", "each" => 8.50, "img" => "CheeseBaconPie.jpg"],
    ["name" => "Egg, Bacon & Cheese Muffin", "each" => 6.80, "img" => "Brownie.jpg"],
    ["name" => "Mini Filled Croissants", "each" => 6.00, "img" => "Muffin.jpg"]
  ],
  "Donuts" => [
    ["name" => "Cinnamon", "each" => 2.40, "img" => "CheeseBaconPie.jpg"],
    ["name" => "Mini Filled", "each" => 3.80, "img" => "Muffin.jpg"],
    ["name" => "Iced Jam Ball", "each" => 4.80, "img" => "Brownie.jpg"],
    ["name" => "Iced", "each" => 2.80, "img" => "CheeseBaconPie.jpg"],
    ["name" => "Jam Ball", "each" => 4.60, "img" => "Muffin.jpg"],
    ["name" => "Long John", "each" => 5.00, "img" => "Brownie.jpg"]
  ],
  "Cakes and Slices" => [
    ["name" => "Brownie", "each" => 6.00, "img" => "Brownie.jpg"],
    ["name" => "Muffin", "each" => 5.60, "img" => "Muffin.jpg"],
    ["name" => "Cheese & Bacon Pie", "each" => 7.70, "img" => "CheeseBaconPie.jpg"]
  ]
];
?>

<link rel="stylesheet" href="../css/style.css">

<div class="menu-page">
  <h1>Our Menu</h1>

  <?php foreach ($menu as $category => $items): ?>
    <h2 class="menu-category"><?= $category ?></h2>
    <div class="menu-grid">
      <?php foreach ($items as $item): ?>
        <div class="menu-item">
          <img src="../images/<?= $item['img'] ?>" alt="<?= $item['name'] ?>">
          <h3><?= $item['name'] ?></h3>

          <p><strong>Each: $<?= number_format($item['each'], 2) ?></strong></p>
          <form method="post">
            <input type="hidden" name="product" value="<?= htmlspecialchars($item['name']) ?>">
            <input type="hidden" name="price" value="<?= $item['each'] ?>">
            <input type="hidden" name="type" value="Each">
            <input type="number" name="quantity" value="1" min="1" class="qty-box">
            <button type="submit" class="add-btn">Add Each</button>
          </form>

          <?php if (!empty($item['dozen'])): ?>
            <p><strong>Dozen: $<?= number_format($item['dozen'], 2) ?></strong></p>
            <form method="post">
              <input type="hidden" name="product" value="<?= htmlspecialchars($item['name']) ?>">
              <input type="hidden" name="price" value="<?= $item['dozen'] ?>">
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

<?php include('../partials/footer.php'); ?>
