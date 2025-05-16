<?php include_once '../partials/header.php'; ?>

<div class="contact-page" style="padding: 60px 20px; font-family: 'Segoe UI', sans-serif;">
  <h1 style="text-align: center; color: #c0392b;">Contact Us</h1>

  <div style="max-width: 1000px; margin: auto; display: flex; flex-wrap: wrap; gap: 40px; justify-content: space-between; margin-top: 40px;">
    <!-- Contact Details -->
    <div style="flex: 1 1 45%; min-width: 300px;">
      <h3 style="color: #c0392b;">📍 Visit Us</h3>
      <p>CBD Bakery<br>123 Sweet Street<br>Melbourne, VIC 3000</p>

      <h3 style="color: #c0392b;">📞 Call</h3>
      <p>+61 3 9123 4567</p>

      <h3 style="color: #c0392b;">📧 Email</h3>
      <p>info@cbdbakery.com.au</p>

      <h3 style="color: #c0392b;">🕒 Hours</h3>
      <p>Monday to Saturday: 8:00 AM – 6:00 PM<br>Sunday: Closed</p>
    </div>

    <!-- Contact Form -->
    <div style="flex: 1 1 45%; min-width: 300px;">
      <h3 style="color: #c0392b;">💬 Send Us a Message</h3>
      <form method="POST" action="#">
        <input type="text" name="name" placeholder="Your Name" required style="width: 100%; margin-bottom: 15px; padding: 10px; border: 1px solid #ccc;">
        <input type="email" name="email" placeholder="Your Email" required style="width: 100%; margin-bottom: 15px; padding: 10px; border: 1px solid #ccc;">
        <textarea name="message" placeholder="Your Message" rows="5" required style="width: 100%; margin-bottom: 15px; padding: 10px; border: 1px solid #ccc;"></textarea>
        <button type="submit" class="add-btn">Send Message</button>
      </form>
    </div>
  </div>

  <!-- Google Map -->
  <div style="margin-top: 60px;">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345094573!2d144.95373531531695!3d-37.816279979751954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d43f1faaaab%3A0x5045675218cecd0!2sMelbourne%20CBD%20VIC!5e0!3m2!1sen!2sau!4v1605833888014!5m2!1sen!2sau"
      width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
</div>
<script src="../js/cart.js"></script>

<?php include_once '../partials/footer.php'; ?>


