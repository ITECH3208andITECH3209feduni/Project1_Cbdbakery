<style>
/* Sidebar Styling */
.sidebar {
  width: 250px;
  background-color: #2c3e50;
  color: white;
  position: fixed;
  top: 0;
  left: 0;
  height: 100vh;
  padding-top: 30px;
  display: flex;
  flex-direction: column;
  box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
}

.sidebar h2 {
  text-align: center;
  margin-bottom: 25px;
  font-size: 22px;
  font-weight: bold;
}

.sidebar a {
  padding: 15px 25px;
  display: block;
  border-bottom: 1px solid #34495e;
  color: white;
  transition: background 0.2s ease;
}

.sidebar a:hover {
  background-color: #34495e;
}

/* Main content shifts right to accommodate sidebar */
.main-content {
  margin-left: 250px;
  padding: 30px;
  width: calc(100% - 250px);
}
</style>
<div class="sidebar">
  <h2>CBD Admin</h2>
  <a href="dashboard.php">🏠 Dashboard</a>
  <a href="orders.php">📦 Placed Orders</a>
  <a href="products.php">🛒 Product Management</a>
  <a href="add_product.php">➕ Add Product</a>
  <a href="staff.php">👥 Staff Management</a>
  <a href="contacts.php">📧 Contact Submissions</a>
  <a href="../includes/logout.php">🚪 Logout</a>
</div>
