<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
<link rel="stylesheet" href="style1.css">

    </head>
    
    <body>
   

    <!-- our products section -->
     <section class="products" id="products">
        
        <h1  class="heading"> <span> Products </span>   
        </h1>
     <!-- Include header.php -->
<?php include 'header.php'; ?>

<div class="box-container">
<?php

include("connection.php");
    if(isset($_POST['search']))

    // Array containing product information
    $products = [
        ["party order.jpg", "Party Orders", "partyorder.php"],
        ["Pies", "pies.html", "pie.jpg"],
        ["Hot Breakfast", "breakfast.html", "breakfast.jpg"],
        ["Donuts", "donuts.html", "donuts.jfif"],
        ["Cakes and Slices", "cake.html", "cakes.jpg"]
    ];

    
    // Loop through the products array to dynamically generate product boxes
    foreach ($products as $product) 
    
    ?>

    <div class="box" >
    <img src="photos/party order.jpg" height="200" width="200" alt=" order.jpg ">
        <h3>Party Orders</h3>
        <a href="partyorder.php" class="btn">Read more</a>
    </div>
    <div class="box">
    <img src="photos/pie.jpg" height="200" width="200" alt=" pie.jpg ">
    <h3>Pie</h3>
        <a href="pie.php" class="btn">Read more</a>
    </div>

    <div class="box">
    <img src="photos/breakfast.jpg" height="200" width="200" alt=" breakfast.jpg ">
        <h3>Hot Breakfast</h3>
        <a href="breakfast.php" class="btn">Read more</a>
    </div>

    <div class="box">
    <img src="photos/donuts.jfif" height="200" width="200" alt=" donuts.jfif ">
        <h3>Donuts</h3>
        <a href="donuts.php" class="btn">Read more</a>
    </div>

    <div class="box">
    <img src="photos/cakes.jpg" height="200" width="200" alt=" cakes.jpg ">
        <h3>Cakes and Slices</h3>
        <a href="cake.php" class="btn">Read more</a>
    </div>
</div>
     </section>
    <!-- our products section -->
    

</body>
</html>

    