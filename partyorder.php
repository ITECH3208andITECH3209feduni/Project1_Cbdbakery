<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'cbd_bakery';

//create connection 
$conn = mysqli_connect($host, $user, $pass, $dbname);

    if(isset($_POST['search']))
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    </head>
        <style>
         body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: rgb(238 231 255 );
    margin: 0;
   padding: 0;
   font-family: Arial, sans-serif;
}

h1 {
    
    
            font-size: 2rem;
            color: rgb(236 72 153);
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            text-shadow: 2px 2px #FF0000;
    

}




img {
    border-radius: 15px;
}   

        .navbar ul{
   list-style-type: none;
   padding: 10px;
   margin: 0px;
   overflow: hidden;

}
/* Navbar styling */
.navbar ul {
   display: flex;
   gap: 30px; /* Space between navbar links */
}
.navbar a{
   color: black;
   text-decoration: none;
   padding: 15px;
   display: block;
   text-align: center;
   font-size: 25px;
   font-style: italic;
}
.navbar a:hover{
   background-color: lightcoral;
}

.active{

    background-color: purple; 
}

.orders{
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(10rem, 1fr));
  gap: 1.5rem; 
}

.orders .partyorder{
    background-color: var(--card-color);
    padding: 3rem 2rem;
    text-align: center; 
}

.orders .partyorder h2{
    color: black;
    font-size: 1.3rem;

}
.orders .partyorder .price{
    color: black;
    font-size: 1.3rem;

}
.orders .partyorder .dozenprice{
    color: black;
    font-size: 1.3rem;

}

.button {
            line-height: 1;
            display: inline-block;
            font-size: 1.3rem;
            text-decoration: none;
            border-radius: 10px;
            color: black;
            padding: 8px;
            background-color: lightpink;
            font-size: 15px;
            font-weight: bold;
        }
        .button:hover {
            color: black;
        }

        .header {
            position: fixed;
            top: 0;
            width: 100%;
            height: 60px;;
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
            height: 50px; /* Smaller logo size when scrolled */
            width: auto;
            transition: height 0.3s ease; /* Smooth transition for logo size */
        }

        .header.scrolled .logo img {
            height: 40px; /* Smaller logo size when scrolled */
        }

        .nav-menu {
            display: flex;
            align-items: center;
        }

        .nav-menu a {
            text-decoration: none;
            font-family: italic bold;
            margin: 0 15px; /* Adjusted margin */
            color: #333; /* Text color */
            position: relative;
            font-size: 20px;
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
            margin-left: 20px;
            font-size: 20px;
            cursor: pointer;
        }

    </style>

<body>
    <!-- header section -->
    <header class="header">
        <div class="logo">
            <img src="photos/homelogo5.jpg" alt="Coffee Shop Logo"> <!-- Adjusted logo path -->
        </div>
        <div class="nav-menu">
            <a href="Homepage.php">Home</a>
            <div class="dropdown">
                <a href="productspage.php">Menu</a>
            </div>
            <a href="contact.php">Contact</a>
            <a href="#about">About Us</a>
        </div>
        <div class="search-cart">
            <input type="text" class="search-bar" placeholder="Search...">
            <div class="cart-icon">&#128722;</div>
        </div>
    </header>
   <br><br><br>

    <h1 style=" text-align: center; ">Party Order</h1>

    

<?php
                  // Array of products
                        $products = [
                           ["Party Sausage Roll", "sausage.jpg", 3.50, 28],
            ["Party Quiche Lorraine", "quiche.jpg", 3.50, 30],
            ["spinach.jpg", "Spinach & Cheese Filo", 3.50, 30],
            ["partypies.jpg","Party Pies",  3.50, 30],
            ["vegetable.jpg","Party Quiche Vegetable",  3.50, 30],
            ["vegpastie.jpg", "Vegan Party Pastie (min 6)",  3.80, 36],
                        ];

              // Loop through each product and generate a table row
                  foreach ($products  as $product) 
          ?>
                  
                  

    <div class="orders">
    <!--item 1 -->
    <div class="partyorder">
        <img src="photos/sausage.jpg"  height="170" width="170" alt="">
        <h2>Sausage Roll</h2>
        <div class="price">$3.50</div> 
        <div class="dozenprice">Dozenprice - $30</div>  <br>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <!--item 2 -->
    <div class="partyorder">
        <img src="photos/quiche.jpg" height="170" width="170" alt="">
        <h2>Quiche Lorraine</h2>
        <div class="price">$3.50</div>
        <div class="dozenprice">Dozenprice - $30</div> <br>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <!--item 3 -->
    <div class="partyorder">
        <img src="photos/spinach.jpg" height="170" width="170" alt="">
        <h2>Spinach & Cheese Filo</h2>
        <div class="price">$3.50</div>
        <div class="dozenprice">Dozenprice - $30</div> <br>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <!--item 4 -->
    <div class="partyorder">
        <img src="photos/partypies.jpg" height="170" width="170" alt="">
        <h2>Party Pies</h2>
        <div class="price">$3.50</div>
        <div class="dozenprice">Dozenprice - $30</div> <br>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <!--item 5 -->
    <div class="partyorder">
        <img src="photos/vegetable.jpg" height="170" width="170" alt="">
        <h2> Quiche Vegetable</h2>
        <div class="price">$3.50</div>
        <div class="dozenprice">Dozenprice - $30</div> <br>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <!--item 6 -->
    <div class="partyorder">
        <img src="photos/vegpastie.jpg" height="170" width="170" alt="">
        <h2>Vegan Pastie (min 6)</h2>
        <div class="price">$3.50</div>
        <div class="dozenprice">Dozenprice - $30</div> <br>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    </div>

    <script>
        function addToCart(name, image, price) {
            let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
            cart.push({ name, image, price });
            localStorage.setItem('cart', JSON.stringify(cart));
            alert(name + " added to cart!");
        }
    </script>
    
</body>
</html>.