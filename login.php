<?php
require_once '../includes/auth.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminId = trim($_POST['admin_id'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (loginAdmin($adminId, $password)) {
        header("Location: admin.php"); // Assumes admin.php is in same /pages/ directory
        exit;
    } else {
        $error = "❌ Invalid ID or Password.";
    }
}
include('../partials/header.php');
?>

<link rel="stylesheet" href="../css/style.css">

<div class="container">
  <h1>Admin Login</h1>

  <?php if (!empty($error)): ?>
    <p style="color: red; font-weight: bold;"><?= $error ?></p>
  <?php endif; ?>

  <form method="post">
    <input type="text" name="admin_id" placeholder="Admin ID or Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" class="add-btn">Login</button>
  </form>
</div>

<?php include('../partials/footer.php'); ?>
