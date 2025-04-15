<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBD Bakery</title>
    <style>
        /* General styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            box-sizing: border-box;
            background-color: #f5fffa;
            height: 100%;
            
        }

        /* Hero Section with background slideshow */
        .hero {
            height: 100vh; /* Full viewport height */
            background-size: cover; /* Ensures image covers the full screen */
            background-position: center; /* Centers the image */
            background-repeat: no-repeat; /* Prevent the image from repeating */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            position: relative;
            animation: bgSlide 13s infinite; /* Total 16 seconds, 4 seconds for each image */
        }

        /* Keyframes for the background image slideshow */
        @keyframes bgSlide {
            0% {
                background-image: url('photos/bgimg2.jpg');
            }
            25% {
                background-image: url('photos/bgimg3.jpg');
            }
            50% {
                background-image: url('photos/bgimg4.jpg');
            }
            75% {
                background-image: url('photos/bgimg5.jpg');
            }
            100% {
                background-image: url('photos/bgimg2.jpg'); /* Return to first image */
            }
        }

        .hero h1 {
            font-size: 4em;
            letter-spacing: 5px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .elementor h2{
            color: black;
            text-align: center;
            font-family: italic bold;
            font-size: 3em;
        }

        /* Logo & Location Section */
        .logo-location-section {
            padding: 10px 0px;
            background-color: #ffffff;
            text-align: center;
        }

        .logo-location-section img {
            width: 300px; /* Adjust the width as needed */
            height: auto;
            margin-bottom: 0px;
        }

        .logo-location-section h2 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .logo-location-section p {
            font-size: 16px;
            color: #777;
            margin-bottom: 30px;
        }

        /* Location Section Styling */
        .location-details {
            display: flex;
            justify-content: center;
            gap: 50px;
            flex-wrap: wrap;
        }

        .location-details div {
            max-width: 300px;
            text-align: left;
        }

        .location-details div h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #c59d5f; /* Gold accent color */
        }

        .location-details div p {
            font-size: 16px;
            color: #333;
            line-height: 1.5;
        }

        .location-details div p a {
            color: #c59d5f;
            text-decoration: none;
            font-weight: 600;
        }

        /* Responsive layout for smaller screens */
        @media (max-width: 768px) {
            .location-details {
                flex-direction: column;
                align-items: center;
            }

            .location-details div {
                max-width: 100%;
            }
        }

        /* Gallery Section */
        #product-gallery {
            padding: 70px 50px;
            background-color: #f9f9f9;
        }

        .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 10px;
            max-width: 2000px;
            margin: 0 auto;
        }

        .gallery-item {
            overflow: hidden;
            position: relative;
            
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item img:hover {
            transform: scale(1.05);
        }

        /* Define various sizes for the grid items */
        .gallery-item.large {
            grid-column: span 2;
            grid-row: span 2;
        }

        .gallery-item.medium {
            grid-column: span 2;
        }

        /* Footer Styling */
        footer {
            background-color: #f8f8f8;
            padding: 40px 20px;
            text-align: center;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .footer-section {
            flex: 1;
            margin: 0 15px;
            min-width: 200px;
        }

        .footer-section h3 {
            font-size: 16px;
            margin-bottom: 10px;
            color: #333;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-section ul li {
            margin-bottom: 8px;
        }

        .footer-section ul li a {
            color: #333;
            text-decoration: none;
            font-size: 14px;
        }

        .footer-section ul li a:hover {
            color: #c59d5f; /* Gold accent color */
        }

        .footer-section p {
            margin: 0;
            font-size: 14px;
        }

        .footer-section a {
            color: #333;
            text-decoration: none;
            font-size: 14px;
        }

        .footer-section a:hover {
            color: #c59d5f; /* Gold accent color */
        }

        .footer-logo {
            width: 190px;
            height: auto;
        }

        footer p {
            font-size: 14px;
            color: #666;
            margin-top: 20px;
        }
        .social-logo {
    width: 30px; /* Adjust the size of the Instagram logo */
    height: auto;
    margin-top: 10px;
}

footer p {
    font-size: 14px;
    color: #666;
    margin-top: 20px;
}



        .header {
            position: fixed;
            top: 0;
            width: 100%;
            height: 70px;;
            background-color: white; /* Default color */
            padding: 5px 0; /* Default padding */
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            transition: background-color 0.3s ease, padding 0.3s ease; /* Smooth transitions */
        }

        .header.scrolled {
            background-color: #f0f0f0; /* Color when scrolled */
            padding: 0px 0; /* Smaller padding when scrolled */
        }

        .logo {
            display: flex;
        }

        .logo img {
            height: 310px; /* Smaller logo size when scrolled */
            width: auto;
            transition: height 0.3s ease; /* Smooth transition for logo size */
        }

       
        .nav-menu {
            display: flex;
            align-items: center;
            margin-right: 200px;
        }

        .nav-menu a {
            text-decoration: none;
            font-family: italic bold;
            margin: 0 15px; /* Adjusted margin */
            color: #333; /* Text color */
            position: relative;
            font-size: 23px;
            transition: color 0.3s ease; /* Smooth transition for hover effect */
        }

        .nav-menu a:hover {
            color: #555; /* Hover color */
        }
        .header.scrolled.nav-menu a {
            
            font-size: 15px;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 35px;
            background-color: #fff;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            padding: 10px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .search-cart {
            display: flex;
            align-items: center;
        }

        .search-bar {
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .cart-icon {
            margin-right: 30px;
            font-size: 30px;
            cursor: pointer;
        }

        .heading {
     text-align: center;
     padding: 2rem 0;
     padding-bottom: 1rem;
     font-size: 2rem;
     color: black;
     margin-top: 100px;
     text-shadow: 2px 2px 4px #000000;
     
  }
 
  
  .products {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        padding: 40px 20px;
        background-color: #D3D3D3;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .gallery {
        border: 1px solid #ccc;
        border-radius: 12px;
        overflow: hidden;
        width: 220px;
        background: #fff;
        transition: transform 0.3s, box-shadow 0.3s;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .gallery:hover {
        border-color: #777;
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .gallery img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    .desc {
        padding: 15px;
        text-align: center;
        font-size: 20px;
        color: black;
        font-style: oblique;
        font-weight: 600;

    }


    <style>
.reviews-section {
  padding: 60px 20px;
  background-color: #f9f6f2;
  text-align: center;
}

.section-title {
  font-size: 2rem;
  margin-bottom: 40px;
  font-family: 'Georgia', serif;
  color: #333;
  text-align: center;
  text-shadow: 2px 2px 4px #000000;
}

.reviews-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 30px;
}

.review-card {
  background-color: #ffffff;
  border-radius: 16px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.08);
  padding: 25px;
  max-width: 350px;
  flex: 1 1 300px;
  transition: transform 0.3s ease;
}

.review-card:hover {
  transform: translateY(-5px);
}

.review-text {
  font-size: 1rem;
  color: #555;
  line-height: 1.6;
  margin-bottom: 15px;
}

.review-author {
  font-weight: bold;
  color: #8b5e3c;
}
</style>




    </style>
</head>


<body >



<header class="header">

<div class="logo">
            <img src="photos/logo1.png" alt="Coffee Shop Logo"> <!-- Adjusted logo path -->
        </div>
        
        <div class="nav-menu">
            <a href="Homepage.php">Home</a>
            <div class="dropdown">
                <a href="menu.php">Menu</a>
            </div>
            
            <a href="contact.php">Contact</a>
            <a href="#about">About Us</a>
            
        </div>
        <div class="search-cart">
            
            <div class="cart-icon">&#128722;</div>
        </div>
    </header>

    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            const scrollPosition = window.scrollY;

            if (scrollPosition > 100) { // Change 100 to the scroll position at which you want to trigger the effect
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>



<!-- Hero Section with Slideshow -->
<div class="hero">
    <h1>Welcome to CBD Bakery</h1>
</div>


 <!-- our products section -->
 <section class="products" id="products">
        
        <h1  class="heading"> <span> Our Favorite Menu </span>   
        </h1>
     


<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'cbd_bakery';

//create connection 
$conn = mysqli_connect($host, $user, $pass, $dbname);

    if(isset($_POST['search']))

    // Array containing product information
    $products = [
       
        ["Pies", "pies.html", "pie.jpg"],
        ["Hot Breakfast", "breakfast.html", "breakfast.jpg"],
        ["Donuts", "donuts.html", "donuts.jfif"],
        ["Cakes and Slices", "cake.html", "cakes.jpg"]
    ];

    
    
    
    ?>

    


<div class="gallery">
    <a target="_blank" href="#">
        <img src="photos/pie.jpg" alt="CBD Pie">
    </a>
    <div class="desc">Apple Pie</div>
</div>

<div class="gallery">
    <a target="_blank" href="#">
        <img src="photos/donuts.jfif" alt="CBD Donuts">
    </a>
    <div class="desc">Chocolate Donuts</div>
</div>

<div class="gallery">
    <a target="_blank" href="#">
        <img src="photos/breakfast.jpg" alt="CBD Brownies">
    </a>
    <div class="desc">Breakfast</div>
</div>

<div class="gallery">
    <a target="_blank" href="#">
        <img src="photos/cakes.jpg" alt="CBD Cake">
    </a>
    <div class="desc">Cakes</div>
</div>
     </section>
    <!-- our products section -->
    

<!-- About Us Section -->
<section id="about-us" style="background-color: #F0F8FF; padding: 10px 2px; font-family: 'Segoe UI', sans-serif;">
  <div style="max-width: 1000px; margin: auto;">
    <h2 style="text-align: center; color: #333; font-size: 2.5rem; margin-bottom: 30px; text-shadow: 2px 2px 4px #000000;">About Us</h2>

    <!-- Block 1: Image then Text -->
    <div style="display: flex; flex-wrap: wrap; align-items: center; margin-bottom: 60px;">
      <div style="flex: 1; min-width: 300px; padding: 10px;">
        <img src="photos/about1.jpg" alt="CBD Bakery Exterior" style="width: 450px; height:350px; border-radius: 12px; margin-left: -200px;">
      </div>
      <div style="flex: 1; min-width: 300px; padding: 10px; font-size: 1.4rem; color: #444; line-height: 1.7; font-family: Georgia, serif; margin-left: -20px;">
        <p>Welcome to <strong>CBD Bakery</strong> – where wellness meets indulgence. We specialize in baking delicious, CBD-infused treats that soothe your mind while satisfying your sweet tooth.</p>
      </div>
      <div style="flex: 1; min-width: 300px; padding: 10px;">
        <img src="photos/about2.jpg" alt="CBD Pastries" style="width: 400px; height:400px; border-radius: 12px; margin-right: 50px;">
      </div>
    </div>


    <div style="display: flex; flex-wrap: wrap; align-items: center; margin-top: -100px;">
    <div style="flex: 1; min-width: 300px; padding: 10px; font-size: 1.2rem; color: #444; line-height: 1.8; margin-left: -200px;font-family: Georgia, serif; ">
        <p><strong>CBD Bakery</strong> is a traditional country-style Bakery Cafe located in Melbourne's CBD. With over 30 years in the baking industry, all our products are made onsite with fresh ingredients, providing fast food for busy people.</p>
      </div>
      <div style="flex: 1; min-width: 300px; padding: 10px;">
        <img src="photos/about3.jpg" alt="CBD Bakery Exterior" style="width: 400px; height:300px; border-radius: 12px;">
      </div>
      <div style="flex: 1; min-width: 300px; padding: 10px; font-size: 1.4rem; color: #444; line-height: 1.7; font-family: Georgia, serif; margin-right:-150px; ">
      <p>Made fresh every day, by hand, to your order. Simple to order, delicious to eat.</p>
      </div>

 </div>


  </div>
</section>
<br><br>



<section id="party-orders" style="background-color: #D3D3D3; padding: 60px 20px; font-family: 'Segoe UI', sans-serif;">
  <div style="max-width: 1200px; margin: auto;">
    
    <!-- Title & Quote -->
    <div style="text-align: center; margin-bottom: 50px;">
      <h2 style="font-size: 3rem; color: #333; text-shadow: 1px 1px 3px #000;">Party Orders</h2>
      <p style="font-size: 1.2rem; color: #555; max-width: 600px; margin: auto;">"Celebrate every occasion with the perfect bite – handcrafted CBD delights, made fresh for your party!"</p>
    </div>

    <!-- Menu Grid -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px 60px;">

      <!-- Party Order Item -->
      <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #ddd; padding-bottom: 20px;">
        <div style="display: flex; align-items: center; gap: 15px;">
          <img src="photos/sausage.jpg" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;">
          <div>
            <h3 style="margin: 0; font-size: 1.1rem;">Sausage Roll</h3>
            <small style="color: #888;">Dozenprice - $30</small>
          </div>
        </div>
        <div>
          <span style="color: goldenrod; font-size: 1.2rem; font-weight: bold;">$3.50</span><br>
          <a href="add_to_cart.php" style="font-size: 0.8rem; text-decoration: none; color: #fff; background: #88cc9a; padding: 6px 12px; border-radius: 5px;">Add to cart</a>
        </div>
      </div>

      <!-- Repeat Party Order Items (copy-paste and change data) -->

      <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #ddd; padding-bottom: 20px;">
        <div style="display: flex; align-items: center; gap: 15px;">
          <img src="photos/quiche.jpg" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;">
          <div>
            <h3 style="margin: 0; font-size: 1.1rem;">Quiche Lorraine</h3>
            <small style="color: #888;">Dozenprice - $30</small>
          </div>
        </div>
        <div>
          <span style="color: goldenrod; font-size: 1.2rem; font-weight: bold;">$3.50</span><br>
          <a href="add_to_cart.php" style="font-size: 0.8rem; text-decoration: none; color: #fff; background: #88cc9a; padding: 6px 12px; border-radius: 5px;">Add to cart</a>
        </div>
      </div>

      <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #ddd; padding-bottom: 20px;">
        <div style="display: flex; align-items: center; gap: 15px;">
          <img src="photos/spinach.jpg" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;">
          <div>
            <h3 style="margin: 0; font-size: 1.1rem;">Spinach & Cheese Filo</h3>
            <small style="color: #888;">Dozenprice - $30</small>
          </div>
        </div>
        <div>
          <span style="color: goldenrod; font-size: 1.2rem; font-weight: bold;">$3.50</span><br>
          <a href="add_to_cart.php" style="font-size: 0.8rem; text-decoration: none; color: #fff; background: #88cc9a; padding: 6px 12px; border-radius: 5px;">Add to cart</a>
        </div>
      </div>

      <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #ddd; padding-bottom: 20px;">
        <div style="display: flex; align-items: center; gap: 15px;">
          <img src="photos/partypies.jpg" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;">
          <div>
            <h3 style="margin: 0; font-size: 1.1rem;">Party Pies</h3>
            <small style="color: #888;">Dozenprice - $30</small>
          </div>
        </div>
        <div>
          <span style="color: goldenrod; font-size: 1.2rem; font-weight: bold;">$3.50</span><br>
          <a href="add_to_cart.php" style="font-size: 0.8rem; text-decoration: none; color: #fff; background: #88cc9a; padding: 6px 12px; border-radius: 5px;">Add to cart</a>
        </div>
      </div>

      <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #ddd; padding-bottom: 20px;">
        <div style="display: flex; align-items: center; gap: 15px;">
          <img src="photos/vegetable.jpg" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;">
          <div>
            <h3 style="margin: 0; font-size: 1.1rem;">Quiche Vegetable</h3>
            <small style="color: #888;">Dozenprice - $30</small>
          </div>
        </div>
        <div>
          <span style="color: goldenrod; font-size: 1.2rem; font-weight: bold;">$3.50</span><br>
          <a href="add_to_cart.php" style="font-size: 0.8rem; text-decoration: none; color: #fff; background: #88cc9a; padding: 6px 12px; border-radius: 5px;">Add to cart</a>
        </div>
      </div>

      <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #ddd; padding-bottom: 20px;">
        <div style="display: flex; align-items: center; gap: 15px;">
          <img src="photos/vegpastie.jpg" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;">
          <div>
            <h3 style="margin: 0; font-size: 1.1rem;">Vegan Pastie (min 6)</h3>
            <small style="color: #888;">Dozenprice - $30</small>
          </div>
        </div>
        <div>
          <span style="color: goldenrod; font-size: 1.2rem; font-weight: bold;">$3.50</span><br>
          <a href="add_to_cart.php" style="font-size: 0.8rem; text-decoration: none; color: #fff; background: #88cc9a; padding: 6px 12px; border-radius: 5px;">Add to cart</a>
        </div>
      </div>

    </div>
  </div>
</section>




<!-- Product Gallery Section -->
<div id="product-gallery">
    <div class="gallery-container">
        <div class="gallery-item large">
            <img src="pics/pic5.jpg" alt="Product 1"> <!-- Replace with actual product images -->
        </div>
        <div class="gallery-item medium">
            <img src="pics/pic2.jpg" alt="Product 2">
        </div>
        <div class="gallery-item">
            <img src="pics/pic1.jpg" alt="Product 3">
        </div>
        <div class="gallery-item">
            <img src="pics/pic3.jpg" alt="Product 4">
        </div>
        <div class="gallery-item medium">
            <img src="photos/homebrownie.jpg" alt="Product 5">
        </div>
        <div class="gallery-item large">
            <img src="pics/pic4.png"  alt="Product 6">
        </div>
    </div>
</div>


<!-- Reviews Section -->
<section class="reviews-section">
  <h2 class="section-title">Our Customers Say</h2>
  <div class="reviews-container">
    
    <div class="review-card">
      <p class="review-text">
        “We were in the next building and went here as it looks like a gem. No-frills simple bakery serving different pastries, cakes, but more importantly piping hot pies. We tried the traditional meat pie and the pepper steak ones. Between us, we preferred the traditional ones. Prices were reasonable and coffee was great! Do come before lunch time as it can get quite packed.”
      </p>
    </div>

    <div class="review-card">
      <p class="review-text">
        “Visiting from Sydney and working in an office nearby, I decided to pop in and see what they had. Such a great vibe inside and witnessed some lovely and beautiful people busily working behind the counter. Such a great selection of baked goods — everything looked delicious and extremely tempting.”
      </p>
    </div>

    <div class="review-card">
      <p class="review-text">
        “I visited CBD Bakery at Bourke St for breakfast and coffee. The place is cozy and inviting. The coffee was excellent, and the breakfast options were delicious. The service was friendly and efficient. Not crowded, perfect for a relaxed morning. Highly recommended!”
      </p>
    </div>

  </div>
</section>


<!-- Footer -->
<!-- Footer -->
<footer>
    <div class="footer-container">
        <div class="footer-section">
            <img src="photos/homelogo.jpg" alt="CBD Bakery Logo" class="footer-logo"> <!-- Replace with actual logo -->
        </div>

        <div class="footer-section">
            <h3>Main Street</h3>
            <p>480 Bourke Street,<br> Melbourne Vic 3000</p><br><br>
            <p><a href=https://www.google.com/maps/place/480+Bourke+St,+Melbourne+VIC+3000/@-37.8150957,144.9568927,17z/data!3m1!4b1!4m6!3m5!1s0x6ad65d4b6b8a80ab:0x45b08aad0a01b7c9!8m2!3d-37.8151!4d144.959473!16s%2Fg%2F11c5p_8vlb?entry=ttu&g_ep=EgoyMDI0MTAwOS4wIKXMDSoASAFQAw%3D%3D>Get Directions</a></p>
        </div>
        
        <div class="footer-section">
            <h3>Second Ave</h3>
            <p>Shop 4, 118-126 Queens St,<br> Melbourne Vic 3000</p> <br><br>
            <p><a href="https://maps.google.com">Get Directions</a></p>
        </div>

        <div class="footer-section">
            <h3>Contacts</h3>
            <p><a href="mailto:hello@cbdbakery.com">cbdbakery@gmail.com</a></p>
        </div>
        <div class="footer-section">
            <h3>Socials</h3>
            <a href="https://www.instagram.com/cbdbakery" target="_blank">
                <img src="photos/insta.jpg" alt="Instagram Logo" class="social-logo"> <!-- Replace with Instagram logo -->
            </a>
            <a href="https://www.facebook.com/cbdbakery" target="_blank">
                <img src="photos/fb.jpg" alt="Facebook Logo" class="social-logo"> <!-- Replace with Facebook logo -->
            </a>
        </div>
    </div>
    <p>&copy; 2024 CBD Bakery | All rights reserved</p>
</footer>


    
</body>


