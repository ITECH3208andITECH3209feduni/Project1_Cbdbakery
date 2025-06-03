<?php include_once '../partials/header.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us - CBD Bakery</title>
  <link rel="stylesheet" href="/cbd-bakery-php/css/style.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fdf9f5;
      color: #333;
    }

   .about-header {
  position: relative;
  width: 100%;
  height: 80vh; /* Set height of the banner */
  min-height: 300px;
  background-image: url('/cbd-bakery-php/images/about5.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  display: flex;
  align-items: center;
  justify-content: center;
}

    .about-header h1 {
      font-size: 48px;
      margin: 0;
      background-color: rgba(0,0,0,0.5);
      display: inline-block;
      padding: 10px 20px;
      border-radius: 10px;
    }

    .about-content {
      display: flex;
      flex-wrap: wrap;
      padding: 50px 10%;
      gap: 40px;
      background-color: #fffdf9;
    }

    .about-text {
      flex: 1 1 400px;
    }

    .about-text h2 {
      color: #c0392b;
      font-size: 32px;
      margin-bottom: 20px;
    }

    .about-text p {
      font-size: 18px;
      line-height: 1.6;
    }

    .about-img {
      flex: 1 1 400px;
    }

    .about-img img {
      width: 100%;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    @media (max-width: 768px) {
      .about-content {
        flex-direction: column;
        padding: 20px;
      }
    }

    .our-story-section {
  background-color: #fff;
  padding: 50px 20px 20px;
  text-align: center;
}

.our-story-heading {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
}



.center-content {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.center-content h2 {
  font-size: 36px;
  font-weight: 700;
  font-family: 'Georgia', serif;
  color: #333;
  margin-bottom: 10px;
}

.cake-icon {
  width: 180px;
  height: auto;
  margin-top: -5px;
}


  </style>
</head>
<body>

<section class="our-story-section">
  <div class="our-story-heading">
    <div class="line"></div>
    <div class="center-content">
      <h2>OUR STORY</h2>
      <img src="/cbd-bakery-php/images/about.png" alt="Cake Icon" class="cake-icon">
    </div>
    <div class="line"></div>
  </div>
</section>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


  <!-- Header image -->
  <section class="about-header">
    
  </section>

  <!-- About content -->
  <section class="about-content">
    <div class="about-text">
      <h2>Traditional Taste. Modern Experience.</h2>
      <p>
        CBD Bakery is a traditional country-style Bakery Cafe located in Melbourne’s CBD. With over 30 years of experience in the baking industry, we pride ourselves on crafting delicious, fresh products onsite every day.
        <br><br>
        Whether you're grabbing a quick bite or indulging in our handmade pies, pastries, and cakes — everything is prepared to your order with love and attention to detail.
        <br><br>
        <strong>Made every day, by hand to your order.</strong><br>
        Simple to order, delicious to eat.
      </p>
    </div>
    <div class="about-img">
      <img src="/cbd-bakery-php/images/about2.jpeg" alt="CBD Bakery Interior">
    </div>
  </section>

</body>
</html>
