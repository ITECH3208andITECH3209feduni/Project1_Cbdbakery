<?php include_once '../partials/header.php'; ?> <br>

<link rel="stylesheet" href="../css/style.css">
<style>
  .slideshow {
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  z-index: 0;
}

.slide {
  position: absolute;
  width: 100%;
  height: 100%;
  background-size: cover;
  background-position: center;
  opacity: 0;
  transition: opacity .5s ease-in-out;
}

.slide.active {
  opacity: 1;
}
.hero-title {
  font-size: 4rem; /* You can adjust this value */
  font-weight: 800;
  text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3); /* optional for better visibility */
}

.hero-description {
  font-size: 1.6rem; /* You can adjust this value */
  font-weight: 700;
  color: #fff; /* optional to ensure contrast on slideshow */
  text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3); /* optional */
}

.reviews-section {
  padding: 60px 20px;
  background: #fdfdfd;
  font-family: 'Segoe UI', sans-serif;
  text-align: center;
}
.section-title {
  font-size: 2.rem;
  color: #b23c3c;
  font-weight: bold;
  margin-bottom: 30px;
}

/* Scrollable section */
.reviews-slider {
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  -webkit-overflow-scrolling: touch;
  padding-bottom: 20px;
}
.reviews-track {
  display: flex;
  gap: 20px;
  padding: 10px;
  scroll-snap-align: start;
  width: max-content;
}

/* Review Card */
.review-card {
  flex: 0 0 320px;
  background: #fff;
  border-radius: 16px;
  padding: 25px;
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
  scroll-snap-align: center;
  font-size: 1rem;
  line-height: 1.6;
  color: #333;
  transition: transform 0.3s ease;
}
.review-card img.reviewer-img {
  width: 130px;
  height: 100px;
  border-radius: 50%;
  object-fit: cover;
  margin-bottom: 15px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.15);
}

.review-card:hover {
  transform: translateY(-6px);
}




</style>

<br>
<section class="hero-section relative overflow-hidden" style="text-align: center; padding: 60px 20px; background-color: #f8f8f8; position: relative; height: 550px;">

  <!-- 🔁 Slideshow background images -->
  <div class="slideshow absolute inset-0 z-0">
    <div class="slide active" style="background-image: url('../images/wallpaper.jpg');"></div>
    <div class="slide" style="background-image: url('../images/wallpaper2.jpg');"></div>
    <div class="slide" style="background-image: url('../images/wall_paper.jpg');"></div>
    <div class="slide" style="background-image: url('../images/wallpaper7.jpg');"></div>
  </div>

  <!-- 🔤 Hero Text (stays on top) -->
  <div class="relative z-10 text-white" style="position: relative;">
    <h1 class="hero-title text-4xl font-bold">Welcome to CBD Bakery</h1>
    <p class="hero-description mt-4 text-xl font-semibold leading-relaxed max-w-3xl mx-auto" style="font-size:bold;">
      Discover a mouthwatering collection of freshly baked pastries, artisan breads, sweet treats, and savory delights – all crafted with love and quality ingredients.
    </p>
    <div class="hero-buttons mt-6">
      <a href="menu.php" class="hero-btn red">View Menu</a>
      <a href="contact.php" class="hero-btn dark">Contact Us</a>
    </div>
  </div>
</section>


<section class="highlights">
  <div class="highlight-box">
    <img src="../images/Brownie.jpg" alt="Brownie">
    <h3>Freshly Baked Daily</h3>
    <p>Every item is made fresh with love from our CBD bakery kitchen each morning.</p>
  </div>
  <div class="highlight-box">
    <img src="../images/CheeseBaconPie.jpg" alt="Savory Pie">
    <h3>Savory & Sweet</h3>
    <p>Whether you're craving croissants or pies, our menu has something for every taste.</p>
  </div>
  <div class="highlight-box">
    <img src="../images/Muffin.jpg" alt="Muffin">
    <h3>Perfect for Events</h3>
    <p>Order in bulk for birthdays, meetings, parties or celebrations. We deliver freshness.</p>
  </div>
  <div class="highlight-box">
    <img src="../images/pic7.jpg" alt="Muffin">
    <h3>Vibrant Breakfast Plates</h3>
    <p>Fuel your morning with our colorful and hearty breakfast options — made to satisfy every craving.</p>
  </div>
</section>

<section class="catering-pdf" style="padding: 60px 20px; background-color: #f9fafb;">
  <div style="max-width: 800px; margin: auto; background-color: #ffffff; border-radius: 12px; padding: 40px 30px; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1); text-align: center;">
    
    <h2 style="color: #c0392b; font-size: 2rem; margin-bottom: 10px;">📋 View Our Full Catering Menu</h2>
    <p style="font-size: 1.1rem; color: #555; margin-bottom: 30px;">
      Explore our full catering menu to plan your next event with ease. Crafted to impress guests and satisfy every craving.
    </p>

    <a href="../files/CBD-Bakery-Catering-Menu.pdf" download 
       style="display: inline-block; padding: 14px 28px; background-color: #c0392b; color: #fff; text-decoration: none; font-weight: bold; border-radius: 8px; transition: background-color 0.3s ease;">
      ⬇️ Download Catering Menu (PDF)
    </a>

  </div>
</section>


<br><br>
<section id="about-us" style="background-color: #F0F8FF; padding: 40px 20px; font-family: 'Segoe UI', sans-serif;">
  <div class="main-container">

    <!-- Row 1 -->
    <div style="display: flex; flex-wrap: wrap; align-items: center; margin-bottom: 10px;">
      <div style="flex: 1; min-width: 300px; padding: 10px;">
        <img src="../images/about5.jpg" alt="CBD Bakery Exterior" style="width: 460px; height: 350px; border-radius: 12px;">
      </div>
      <div style="flex: 1; min-width: 300px; padding: 10px; font-size: 1.4rem; color: #444; line-height: 1.7; font-family: Georgia, serif;">
        <p><strong>CBD Bakery</strong> is where wellness meets indulgence. We specialize in CBD-infused treats that soothe your mind while satisfying your sweet tooth.</p>
      </div>
      <div style="flex: 1; min-width: 300px; padding: 10px;">
        <img src="../images/about8.jpg" alt="CBD Pastries" style="width: 440px; height: 340px; border-radius: 12px;">
      </div>
    </div>

   <!-- Row 2 (Fixed Version) -->
<div style="display: flex; flex-wrap: wrap; align-items: center; gap: 15px; margin-top: 10px;">
  
  <!-- Left Text Block -->
  <div style="flex: 1 1 30%; min-width: 280px; padding: 10px; font-size: 1.3rem; color: #444; line-height: 1.8; font-family: Georgia, serif;">
    <p>
      Our philosophy is simple — quality ingredients, time-honored techniques, and a passion for baking. We make everything fresh to order using local ingredients to ensure great taste in every bite.
    </p>
  </div>

  <!-- Center Image -->
  <div style="flex: 1 1 35%; min-width: 300px; padding: 10px;">
    <img src="../images/about7.jpg" alt="CBD Bakery Display" style="width: 100%; height: auto; border-radius: 12px;">
  </div>

  <!-- Right Text Block -->
  <div style="flex: 1 1 30%; min-width: 280px; padding: 10px; font-size: 1.4rem; color: #444; line-height: 1.7; font-family: Georgia, serif;">
  <p> 🌿 We're here to make your day better, one pastry at a time.</p>
    </div>


</div>


  </div>
</section>


<section class="gallery-showcase">
  

  <div class="gallery-wrapper" >

     <div class="gallery-heading" >
    <h2>Our Fresh Creations</h2>
    <p>Take a peek inside the heart of CBD Bakery – where taste meets tradition. </p>
    <P>Enjoy a refreshing mix of healthy ingredients that look as good as they taste — perfect for health lovers.</p>
    <p>Our puff pastries are light, crisp, and filled with seasonal fruits and custards — perfect with your morning coffee.</p>
     </div>

    <div class="gallery-box tall" style="height:800px;">
      <img src="/cbd-bakery-php/images/pic6.jpg" alt="Pastries Display">
    </div>
    <div class="gallery-box" style="height:400px;">
      <img src="/cbd-bakery-php/images/pic2.jpg" alt="Bakery Front View">
    </div>
    <div class="gallery-box" style="height:400px;">
      <img src="/cbd-bakery-php/images/pic3.jpg" alt="Colorful Breakfast Options">
    </div>
    <div class="gallery-box wide"  style="height:380px; margin-top: -100px;">
      <img src="/cbd-bakery-php/images/pic4.png" alt="Strawberry Puff Pastries">
    </div>
    
  </div>
</section>


<section class="reviews-section">
  <h2 class="section-title">Our Customer Testimonials</h2>

  <div class="reviews-slider">
    <div class="reviews-track">
      <div class="review-card">
        <img src="../images/review1.jpeg" alt="Customer 3" class="reviewer-img">
  <h4 style="margin-bottom: 10px; font-weight: 600;">Sarah M.</h4>
  “We were in next building and we went here as it looks like gem. No frills simple bakery serving different pastries, cakes, but more importantly piping hot pies. We tried the traditional meat pie and the pepper steak ones. Between us we preferred the traditional ones. Prices were reasonable and coffee was great! Do come before lunch time as it can get quite packed during lunch.”</div>
      <div class="review-card">
        <img src="../images/review2.jpeg" alt="Customer 3" class="reviewer-img">
  <h4 style="margin-bottom: 10px; font-weight: 600;">jhon</h4>
      “Visiting from Sydney and working in an office nearby so decided to pop in and see what they had. Such a great vibe inside and witnessed some very lovely and beautiful people busily working behind the counter. Such a great selection of baked goods - everything looked delicious and extremely tempting.. I got a coffee, free donut, a bacon and egg muffin, and an apple scroll. The coffee was 10/10 and so was everything else. Will definitely be coming back every time I'm back in the city!”</div>
      <div class="review-card">
        <img src="../images/review3.jpg" alt="Customer 3" class="reviewer-img">
  <h4 style="margin-bottom: 10px; font-weight: 600;">clarisa</h4>
      “I visited CBD Bakery at Bourke St for breakfast and coffee. The place is cozy and inviting. The coffee was excellent, and the breakfast options were delicious. The service was friendly and efficient. Not crowded, perfect for a relaxed morning. Highly recommended!.”</div>
      <div class="review-card">
        <img src="../images/reveiw5.jpg" alt="Customer 3" class="reviewer-img">
  <h4 style="margin-bottom: 10px; font-weight: 600;">jhon</h4>
      “CBD bakery is fantastic!! We had to organise a last minute morning tea for work and the staff were incredibly helpful and understanding. The hot cross buns and slices that we ordered were so delicious and really reasonably priced for such high quality. Everyone loved them (even the hot cross bun impartialists). A big big thank you to the team for being so lovely - I would highly recommend CBD bakery!.”</div>
      <div class="review-card">
        <img src="../images/review4.jpg" alt="Customer 3" class="reviewer-img">
  <h4 style="margin-bottom: 10px; font-weight: 600;">jhon</h4>
      “Great little bakery and lunch spot. The .selection of baked goods is fantastic. You can go every day and still find something different on the shelves. Fresh baked goods so yummy and delicious. Service is top shelf so friendly and knowledgeable. Coffee was also very good. You are made very welcome and feel like you are a visitor everyday. Love this bakery.”</div>
      <div class="review-card">
        <img src="../images/review6.jpg" alt="Customer 3" class="reviewer-img">
  <h4 style="margin-bottom: 10px; font-weight: 600;">jhon</h4>
      “Stumbled upon this hidden gem when recently in Melbourne. It has everything you expect from a country bakery but right in the Melbourne city.”</div>
      <div class="review-card">
        <img src="../images/review7.avif" alt="Customer 3" class="reviewer-img">
  <h4 style="margin-bottom: 10px; font-weight: 600;">jhon</h4>
      “This wonderful little shop is right outside the door of the Hilton Little Queen Street. Such a great stop for coffee & pastries / sandwiches. There is the sweetest and prettiest girl working there who looks exactly like Kylie Jenner, just prettier. She was so lovely asking us all about our holiday 🩷.”</div>
      <div class="review-card">
        <img src="../images/review8.jpeg" alt="Customer 3" class="reviewer-img">
  <h4 style="margin-bottom: 10px; font-weight: 600;">jhon</h4>
      “Beautiful little bakery, the service was top tier and very helpful!. Had the chicken and leek pie was delicious and fresh. The glazed doughnuts are so light, fluffy and beautifully balanced in flavour😁”</div>
    </div>
  </div>
</section>




<script src="../js/cart.js"></script>

<?php include_once '../partials/footer.php'; ?>
<script>
  let currentSlide = 0;
  const slides = document.querySelectorAll('.slideshow .slide');

  function showNextSlide() {
    slides[currentSlide].classList.remove('active');
    currentSlide = (currentSlide + 1) % slides.length;
    slides[currentSlide].classList.add('active');
  }

  setInterval(showNextSlide, 4000); // Change slide every 4 seconds
</script>
