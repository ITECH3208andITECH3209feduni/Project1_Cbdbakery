<?php
require_once '../includes/functions.php';
include_once '../partials/header.php';

$submitted = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = dbConnect();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'] ?? 'General Inquiry';
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    $stmt->execute();

    $submitted = true;
}
?>

<style>
   
   .contact-page {
  padding: 60px 20px;
  font-family: 'Quicksand', sans-serif;
  background-color: #fff8f4;
  color: #333;
}

.contact-page h1 {
  text-align: center;
  color: #c0392b;
  font-size: 36px;
  margin-bottom: 40px;
}

.contact-wrapper {
  max-width: 1100px;
  margin: auto;
  display: flex;
  flex-wrap: wrap;
  gap: 40px;
  justify-content: space-between;
}

.contact-info, .contact-form {
  flex: 1 1 45%;
  min-width: 300px;
  background-color: #fff;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
}

.contact-info h3,
.contact-form h3 {
  color: #c0392b;
  margin-bottom: 15px;
  font-size: 20px;
}

.contact-info p {
  margin: 10px 0;
  font-size: 15px;
  line-height: 1.6;
}

.contact-form input,
.contact-form textarea {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px 15px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 14px;
  transition: border-color 0.3s ease;
}

.contact-form input:focus,
.contact-form textarea:focus {
  border-color: #c0392b;
  outline: none;
}

.add-btn {
  background-color: #c0392b;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 6px;
  font-weight: bold;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.add-btn:hover {
  background-color: #992d22;
}

.success-message {
  text-align: center;
  color: green;
  font-weight: bold;
  margin-bottom: 30px;
  font-size: 16px;
}



</style>

<!-- Add this in your header.php before </head> -->
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">

<div class="contact-page">
  <h1>Contact Us</h1>

  <?php if ($submitted): ?>
    <p class="success-message">✅ Thank you! Your message has been received.</p>
  <?php endif; ?>

  <div class="contact-wrapper">
    <!-- Contact Details -->
    <div class="contact-info">
      <h3>📍 Visit Us</h3>
      <p>CBD Bakery<br>480 Bourke Street<br>Melbourne, VIC 3000</p>
      <p>CBD Pies<br>Shop 4, 118-126 Queens St​<br>Melbourne, VIC 3000</p>

      <h3>📞 Call</h3>
      <p>(03) 9670 2640</p>

      <h3>📧 Email</h3>
      <p>cbdbakery@gmail.com</p>

      <h3>🕒 Hours</h3>
      <p>Mon - Fri: 7am - 3pm<br>​​Sat - Closed<br>Sun - Closed</p>
    </div>

    <!-- Contact Form -->
    <div class="contact-form">
      <h3>💬 Send Us a Message</h3>
      <form method="POST" action="">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="text" name="subject" placeholder="Subject">
        <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
        <button type="submit" class="add-btn">Send Message</button>
      </form>
    </div>
  </div>
</div>

<br><br>


<script src="../js/cart.js"></script>
<?php include_once '../partials/footer.php'; ?>
