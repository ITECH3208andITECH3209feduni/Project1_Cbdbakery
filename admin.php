<?php
require_once '../includes/admin_protect.php';
require_once '../partials/header.php';
require_once '../includes/functions.php';

$conn = dbConnect();

// Fetch Orders + Payments
$orders = [];
$orderResult = $conn->query("
  SELECT 
    o.id AS order_id,
    o.customer_name,
    o.email,
    o.phone,
    o.address,
    o.delivery_method,
    o.created_at,
    p.method AS payment_method,
    p.amount AS payment_amount
  FROM orders o
  LEFT JOIN payments p ON o.id = p.order_id
  ORDER BY o.created_at DESC
");
while ($row = $orderResult->fetch_assoc()) {
    $orders[] = $row;
}

// Fetch products
$products = [];
$result = $conn->query("SELECT * FROM products ORDER BY id DESC");
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

// Fetch staff
$staff = [];
$staffResult = $conn->query("SELECT * FROM staff");
while ($row = $staffResult->fetch_assoc()) {
    $staff[] = $row;
}

// Fetch contact messages
$messages = [];
$result = $conn->query("SELECT * FROM contact_messages ORDER BY submitted_at DESC");
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}
?>

<link rel="stylesheet" href="../css/style.css">

<div class="admin-dashboard container">
  <h1>Admin Dashboard</h1>

  <h2>Placed Orders</h2>
  <table>
    <tr>
      <th>Order ID</th><th>Customer</th><th>Email</th><th>Phone</th>
      <th>Address</th><th>Delivery</th><th>Payment</th><th>Amount</th><th>Placed At</th>
    </tr>
    <?php foreach ($orders as $o): ?>
      <tr>
        <td>#<?= $o['order_id'] ?></td>
        <td><?= htmlspecialchars($o['customer_name']) ?></td>
        <td><?= htmlspecialchars($o['email']) ?></td>
        <td><?= htmlspecialchars($o['phone']) ?></td>
        <td><?= htmlspecialchars($o['address']) ?></td>
        <td><?= htmlspecialchars($o['delivery_method']) ?></td>
        <td><?= htmlspecialchars($o['payment_method']) ?></td>
        <td>$<?= number_format($o['payment_amount'], 2) ?></td>
        <td><?= $o['created_at'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <h2>Product Management</h2>
  <table>
    <tr>
      <th>ID</th><th>Name</th><th>Category</th><th>Each</th><th>Dozen</th><th>Image</th><th>Description</th><th>Action</th>
    </tr>
    <?php foreach ($products as $p): ?>
    <tr>
      <td><?= $p['id'] ?></td>
      <td><?= htmlspecialchars($p['name']) ?></td>
      <td><?= htmlspecialchars($p['category']) ?></td>
      <td>$<?= number_format($p['each_price'], 2) ?></td>
      <td>$<?= number_format($p['dozen_price'], 2) ?></td>
      <td><img src="../images/<?= htmlspecialchars($p['image']) ?>" width="60"></td>
      <td><?= htmlspecialchars($p['description']) ?></td>
      <td>
        <form method="post" action="../includes/admin_actions.php" onsubmit="return confirm('Delete this product?');">
          <input type="hidden" name="delete_product_id" value="<?= $p['id'] ?>">
          <button type="submit" name="delete_product" class="delete-btn">🗑</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>

  <h3>Add New Product</h3>
  <form method="post" action="../includes/admin_actions.php" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Product Name" required>
    <input type="text" name="category" placeholder="Category" required>
    <input type="number" step="0.01" name="price_each" placeholder="Each Price" required>
    <input type="number" step="0.01" name="price_dozen" placeholder="Dozen Price">
    <input type="file" name="img" accept="image/*" required>
    <textarea name="description" placeholder="Product Description" rows="3" required style="flex: 1 1 100%;"></textarea>
    <div style="flex: 1 1 100%; display: flex; justify-content: flex-end;">
      <button type="submit" name="add_product" class="add-btn">➕ Add Product</button>
    </div>
  </form>

  <h2>Staff Management</h2>
  <table>
    <tr><th>ID</th><th>Name</th><th>Role</th><th>Email</th><th>Contact</th><th>Actions</th></tr>
    <?php foreach ($staff as $s): ?>
      <tr>
        <form method="post" action="../includes/admin_actions.php">
          <input type="hidden" name="id" value="<?= $s['id'] ?>">
          <td><?= $s['id'] ?></td>
          <td><input name="name" value="<?= htmlspecialchars($s['name']) ?>"></td>
          <td><input name="role" value="<?= htmlspecialchars($s['role']) ?>"></td>
          <td><input name="email" value="<?= htmlspecialchars($s['email']) ?>"></td>
          <td><input name="contact" value="<?= htmlspecialchars($s['contact']) ?>"></td>
          <td>
            <button type="submit" name="edit_staff">Edit</button>
            <button type="submit" name="delete_staff" onclick="return confirm('Delete this staff?')">Delete</button>
          </td>
        </form>
      </tr>
    <?php endforeach; ?>
  </table>

  <h3>Add New Staff</h3>
  <form method="post" action="../includes/admin_actions.php">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="role" placeholder="Role" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="contact" placeholder="Contact" required>
    <button type="submit" name="add_staff" class="add-btn">Add Staff</button>
  </form>

  <h2>Contact Form Submissions</h2>
  <table>
    <tr>
      <th>ID</th><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Submitted At</th>
    </tr>
    <?php foreach ($messages as $m): ?>
      <tr>
        <td><?= $m['id'] ?></td>
        <td><?= htmlspecialchars($m['name']) ?></td>
        <td><?= htmlspecialchars($m['email']) ?></td>
        <td><?= htmlspecialchars($m['subject']) ?></td>
        <td><?= nl2br(htmlspecialchars($m['message'])) ?></td>
        <td><?= $m['submitted_at'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <a href="../includes/logout.php" class="btn logout">Log Out</a>
</div>

<?php include '../partials/footer.php'; ?>
