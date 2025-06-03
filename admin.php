<?php
require_once '../includes/admin_protect.php';
require_once '../includes/functions.php';

$conn = dbConnect();

// Fetch Orders
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
  o.status,
  p.method AS payment_method,
  p.amount AS payment_amount
FROM orders o
LEFT JOIN payments p ON o.id = p.order_id

  ORDER BY o.created_at DESC
");
if (!$orderResult) {
    die("Order query failed: " . $conn->error);
}

while ($row = $orderResult->fetch_assoc()) {
    $orders[] = $row;
}

// Fetch Order Items
$orderItemsByOrder = [];
$itemResult = $conn->query("SELECT * FROM order_items");
if (!$itemResult) {
    die("Order items query failed: " . $conn->error);
}

while ($row = $itemResult->fetch_assoc()) {
    $orderId = $row['order_id'];
    if (!isset($orderItemsByOrder[$orderId])) {
        $orderItemsByOrder[$orderId] = [];
    }
    $orderItemsByOrder[$orderId][] = $row;
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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- Top Navbar -->
<header class="fixed top-0 left-0 right-0 bg-white shadow h-16 flex items-center justify-between px-6 z-50" style="background-color: black;">
  <div class="text-xl font-bold text-gray-800" style="color:white;">CBD Bakery Admin</div>
  <div class="flex items-center gap-4">
    <a href="../index.php" class="text-gray-600 hover:text-black" style="color:white;">Home</a>
    <a href="../includes/logout.php" class="text-red-500 hover:underline" >Logout</a>
  </div>
</header>

<!-- Sidebar -->
<aside class="fixed top-16 left-0 h-full w-64 bg-black shadow-md z-40">
  <div class="p-6 text-lg text-white font-semibold border-b">Admin Menu</div>
  <nav class="flex flex-col p-4 space-y-4">
    <button onclick="showSection('orders')" class="text-left text-white hover:bg-gray-200 px-3 py-2 rounded">📦 Placed Orders</button>
<button onclick="showSection('products')" class="text-left text-white hover:bg-gray-200 px-3 py-2 rounded">🛍️ Product Management</button>
<button onclick="showSection('add_product')" class="text-left text-white hover:bg-gray-200 px-3 py-2 rounded">➕ Add Product</button>
<button onclick="showSection('staff_management')" class="text-left text-white hover:bg-gray-200 px-3 py-2 rounded">👥 Staff Management</button>
<button onclick="showSection('contact_submission')" class="text-left text-white hover:bg-gray-200 px-3 py-2 rounded">✉️ Contact Submissions</button>

  </nav>
</aside>

<!-- Begin page content wrapper -->
<main class="ml-64 pt-20 px-6 pb-10 min-h-screen overflow-auto"> <!-- Push content beside sidebar and below navbar -->


<link rel="stylesheet" href="../css/style.css">


<div class="admin-dashboard container" style="background-color:white; text-align:center;">
  <h1 style="font-weight: bold; font-size: large;">Admin Dashboard</h1>
<!-- Placed Orders Section -->
 <div id="orders" class="admin-section">
<h2 style="font-size: large; font-weight: bold;">Placed Orders</h2>
<table>
  <tr>
    <th>Order ID</th>
    <th>Customer</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Delivery</th>
    <th>Payment</th>
    <th>Amount</th>
    <th>Status</th>
    <th>Items Ordered</th>
    <th>Action</th>
    <th>Placed At</th>
  </tr>

  <?php foreach ($orders as $o): ?>
    <tr>
      <td><?= $o['order_id'] ?></td>
      <td><?= htmlspecialchars($o['customer_name']) ?></td>
      <td><?= htmlspecialchars($o['email']) ?></td>
      <td><?= htmlspecialchars($o['phone']) ?></td>
      <td><?= htmlspecialchars($o['address']) ?></td>
      <td><?= htmlspecialchars($o['delivery_method']) ?></td>
      <td><?= htmlspecialchars($o['payment_method']) ?></td>
      <td><?= number_format($o['payment_amount'], 2) ?></td>
      <td><?= htmlspecialchars($o['status']) ?></td>
      <td>
        <?php if (isset($orderItemsByOrder[$o['order_id']])): ?>
          <?php foreach ($orderItemsByOrder[$o['order_id']] as $item): ?>
            <?= htmlspecialchars($item['product_name']) ?> - Qty: <?= $item['quantity'] ?>
          <?php endforeach; ?>
        <?php else: ?>
          No items
        <?php endif; ?>
      </td>
      <td>
        <form method="post" action="../includes/admin_actions.php">
          <input type="hidden" name="order_id" value="<?= $o['order_id'] ?>">
          <button name="action" value="accept" class="btn btn-success">Accept</button>
          <button name="action" value="reject" class="btn btn-danger">Reject</button>
        </form>
      </td>
      <td><?= $o['created_at'] ?></td>
    </tr>
  <?php endforeach; ?>
</table>

</div>


<!-- Product Management -->
<div id="products" class="admin-section hidden">
  <h2 style="font-size: large; font-weight: bold;">Product Management</h2>
<table class="w-full border-collapse bg-white shadow-md mt-6">
  <thead class="bg-gray-100 text-left">
    <tr>
      <th class="p-2 border">ID</th>
      <th class="p-2 border">Name</th>
      <th class="p-2 border">Stock</th>
      <th class="p-2 border">Category</th>
      <th class="p-2 border">Each</th>
      <th class="p-2 border">Dozen</th>
      <th class="p-2 border">Image</th>
      <th class="p-2 border">Description</th>
      <th class="p-2 border">Update Price</th>
      <th class="p-2 border">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $p): ?>
      <tr class="border-t">
        <form method="post" action="../includes/admin_actions.php">
          <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
          <td class="p-2 border"><?= $p['id'] ?></td>
          <td class="p-2 border"><?= htmlspecialchars($p['name']) ?></td>
          <td class="p-2 border">
            <input type="number" name="stock" value="<?= htmlspecialchars($p['stock']) ?>" min="0" class="border p-1 w-20" required>
          </td>
          <td class="p-2 border"><?= htmlspecialchars($p['category']) ?></td>
          <td class="p-2 border">$<?= number_format($p['each_price'], 2) ?></td>
          <td class="p-2 border"><?= htmlspecialchars($p['dozen_price']) ?></td>
          <td class="p-2 border"><img src="../images/<?= htmlspecialchars($p['image']) ?>" alt="" width="50"></td>
          <td class="p-2 border"><?= htmlspecialchars($p['description']) ?></td>
          <td class="p-2 border">
            <input type="number" step="0.01" name="new_price" placeholder="New Price" class="border p-1 w-24">
          </td>
          <td class="p-2 border">
            <button type="submit" name="update_product" class="bg-red-600 text-white px-3 py-1 rounded">Update</button>
          </td>
        </form>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
<!--add products-->
  <div id="add_product" class="admin-section hidden">
  <h3 style="font-size: large; font-weight: bold;">Add New Product</h3>
  <form method="post" action="../includes/admin_actions.php" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Product Name" required>
    <input type="text" name="category" placeholder="Category" required>
    <input type="number" step="0.01" name="price_each" placeholder="Each Price" required>
    <input type="number" step="0.01" name="price_dozen" placeholder="Dozen Price">
    <input type="file" name="img" accept="image/*" required>
    <textarea name="description" placeholder="Product Description" rows="3" required style="flex: 1 1 100%;"></textarea>
    <div style="display:flex; justify-content:space-between; margin-top:10px;">
      <button type="submit" name="add_product" class="add-btn">➕ Add Product</button>
    </div>
  </form>

  <h3 style="font-size: large; font-weight: bold;">Bulk Product Upload (CSV)</h3>
  <form method="post" action="../includes/admin_actions.php" enctype="multipart/form-data">
    <input type="file" name="product_csv" accept=".csv" required>
    <button type="submit" name="upload_csv" class="blue-btn">Upload CSV</button>
  </form>
  <h3 style="font-size: large; font-weight: bold;">Export Products</h3>
<a href="../includes/export_product.php" class="blue-btn" style="display: inline-block; margin-top: 10px;">Download CSV</a>

  </div>




  <!-- Staff Management -->
<div id="staff_management" class="admin-section hidden">
  <h2 style="font-size: large; font-weight: bold;">Staff Management</h2>
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


  <h3 style="font-size: large; font-weight: bold;">Add New Staff</h3>
  <form method="post" action="../includes/admin_actions.php">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="role" placeholder="Role" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="contact" placeholder="Contact" required>
    <button type="submit" name="add_staff" class="add-btn">Add Staff</button>
  </form>
</div>

<!-- Contact Submissions -->
<div id="contact_submission" class="admin-section hidden">
  <h2 style="font-size: large; font-weight: bold;">Contact Form Submissions</h2>
  <table>
    <tr>
      <th>ID</th><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Submitted At</th><th>Reply</th>
    </tr>
    <?php foreach ($messages as $m): ?>
      <tr>
        <td><?= $m['id'] ?></td>
        <td><?= htmlspecialchars($m['name']) ?></td>
        <td><?= htmlspecialchars($m['email']) ?></td>
        <td><?= htmlspecialchars($m['subject']) ?></td>
        <td><?= nl2br(htmlspecialchars($m['message'])) ?></td>
        <td><?= $m['submitted_at'] ?></td>
        <td>
          <form method="post" action="../includes/admin_actions.php">
            <input type="hidden" name="reply_email" value="<?= htmlspecialchars($m['email']) ?>">
            <textarea name="reply_message" rows="2" placeholder="Type your reply..." required></textarea>
            <button type="submit" name="reply_contact" class="green-btn">Send</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
 <script>
function showSection(sectionId) {
  document.querySelectorAll('.admin-section').forEach(section => {
    section.classList.add('hidden');
  });
  const target = document.getElementById(sectionId);
  if (target) {
    target.classList.remove('hidden');
  } else {
    console.warn(`Section with ID "${sectionId}" not found.`);
  }
}
</script>
</div>

    </body>  