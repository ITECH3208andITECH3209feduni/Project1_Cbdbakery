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
    
    

}

.orders{
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(13rem, 1fr));
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



img {
    border-radius: 15px;
}   
    
.navbar ul{
   list-style-type: none;
   background-color: hsl(0, 0%, 25%);
   padding: 10px;
   margin: 0px;
   overflow: hidden;
   display: flex;
   gap: 30px; /* Space between navbar links */

}


.navbar a{
   color: white;
   text-decoration: none;
   padding: 15px;
   display: block;
   text-align: center;
   font-size: 20px;
}
.navbar a:hover{
   background-color: lightcoral;
}

.active{

background-color: purple; 
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
   <br><br><br><br>

    <h1 style="text-align:center; color:rgb(236 72 153);">Cakes and Slices</h1>
    

        <?php
                  // Array of products
                        $products = [
            ["date.jpg", "date scone", 3.20],
            ["plainscone.jpg", "plain scone", 3.00],
            ["jamcream.jpg", "scone with jam & cream", 5.00],
            ["cupcake.jfif","cupcake with icing",  3.60],
            ["buttercake.jpg","cupcake with butter cream",  4.60],
            ["brownie.jpg", "brownie",  5.00],
            ["cherry.jpg", "cherry slice ",  4.80],
            ["caramel.jpg", "caramel slice",  4.90],
            ["hedgehog.jpg", "hedgehog slice",  4.90],
            ["lemon.jpg", "lemon slice",  4.80],
            ["crossiant.jfif", "croissant",  5.80],
            ["almond.jpg", "almond croissant",  5.40],
            ["chocolate.jpg", "flourless almond & orange cake ",  5.40],
            ["orange.jpg", "mini filled criossants",  4.80],
            ["assortedvegan.jpg", "assorted vegan & gluten free slices",  6.00],
            ["tart.jfif", "jam tart",  3.50],
            ["neenish.jpeg", "neenish tart",  3.80],
            ["crackle.jpg", "chocolate crackle",  3.80],
            ["honeyjoy.jpg", "honey joy",  3.80],
            ["apple.jpg", "apple scroll",  4.80],
            ["coffee.jpg", "coffee scroll",  4.80],
            ["cookies.jpg", "cookies",  6.00],
            ["custard.jfif", "custard tart",  4.80],
            ["vanilla.jpg", "vanilla slice",  4.90],
            ["applecake.jfif", "apple cake",  5.00],
            ["lamington.jpg", "lamington",  4.80],
            ["muffin.jpg", "muffin",  5.50],
            ["eclair.jpg", "chocolate eclair",  5.00],
            ["danish.jpg", "danish (assorted fruit & custard)",  5.30],


               ];

              // Loop through each product and generate a table row
                  foreach ($products as $product) 
                  ?>


<div class="orders">

<div class="partyorder">
        <img src="photos/date.jpg" height="120" width="120" alt="">
        <h2>Date Scone</h2>
        <div class="price">$3.20</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/plainscone.jpg" height="120" width="120" alt="">
        <h2>Plain Scone</h2>
        <div class="price">$3.00</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/jamcream.jpg" height="120" width="120" alt="">
        <h2>Scone with jam & cream</h2>
        <div class="price">$5.00</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/cupcake.jfif" height="120" width="120" alt="">
        <h2>Cupcake with Lcing</h2>
        <div class="price">$3.60</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/buttercake.jpg" height="120" width="120" alt="">
        <h2>Cupcake with Butter cream</h2>
        <div class="price">$5.00</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>
    
    <div class="partyorder">
        <img src="photos/brownie.jpg" height="120" width="120" alt="">
        <h2>Brownie</h2>
        <div class="price">$5.00</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/cherry.jpg" height="120" width="120" alt="">
        <h2>Cherry Slice</h2>
        <div class="price">$4.80</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/caramel.jpg" height="120" width="120" alt="">
        <h2>Caramel Roll</h2>
        <div class="price">$4.90</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/hedgehog.jpg" height="120" width="120" alt="">
        <h2>Hedgehog Slice</h2>
        <div class="price">$4.90</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/lemon.jpg" height="120" width="120" alt="">
        <h2>Lemon Slice</h2>
        <div class="price">$4.80</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/crossiant.jfif" height="120" width="120" alt="">
        <h2>Croissant </h2>
        <div class="price">$5.00</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/almond.jpg" height="120" width="120" alt="">
        <h2>Almond Crossiant</h2>
        <div class="price">$5.80</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>


    <div class="partyorder">
        <img src="photos/chocolate.jpg" height="120" width="120" alt="">
        <h2>Chocolate Croissant</h2>
        <div class="price">$5.40</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/orange.jpg" height="120" width="120" alt="">
        <h2>Flourless Almond and Orange cake</h2>
        <div class="price">$4.80</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/assortedvegan.jpg" height="120" width="120" alt="">
        <h2>Assorted Vegan and Gluten free Slices</h2>
        <div class="price">$6.00</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/tart.jfif" height="120" width="120" alt="">
        <h2>Jam Tart</h2>
        <div class="price">$3.50</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/neenish.jpeg" height="120" width="120" alt="">
        <h2>Neenish Tart</h2>
        <div class="price">$3.80</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/crackle.jpg " height="120" width="120" alt="">
        <h2>Chocolate Crackle</h2>
        <div class="price">$3.80</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>


    <div class="partyorder">
        <img src="photos/honeyjoy.jpg " height="120" width="120" alt="">
        <h2>Honey Joy</h2>
        <div class="price">$3.80</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/apple.jpg " height="120" width="120" alt="">
        <h2>Apple Scroll</h2>
        <div class="price">$4.80</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/coffee.jpg " height="120" width="120" alt="">
        <h2>Coffee Scroll</h2>
        <div class="price">$4.80</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/cookies.jpg " height="120" width="120" alt="">
        <h2>Cookies</h2>
        <div class="price">$6.00</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/cookies.jpg " height="120" width="120" alt="">
        <h2>Cookies</h2>
        <div class="price">$6.00</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/custard.jfif " height="120" width="120" alt="">
        <h2>Custard Tart</h2>
        <div class="price">$4.80</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/vanilla.jpg " height="120" width="120" alt="">
        <h2>vanilla Slices</h2>
        <div class="price">$4.90</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/applecake.jfif " height="120" width="120" alt="">
        <h2>Apple Cake</h2>
        <div class="price">$5.00</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>
       
    <div class="partyorder">
        <img src="photos/lamington.jpg " height="120" width="120" alt="">
        <h2>Lamington</h2>
        <div class="price">$4.80</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/muffin.jpg " height="120" width="120" alt="">
        <h2>Muffin</h2>
        <div class="price">$5.50</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/eclair.jpg" height="120" width="120" alt="">
        <h2>Chocolate Eclair</h2>
        <div class="price">$5.00</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/muffin.jpg " height="120" width="120" alt="">
        <h2>Muffin</h2>
        <div class="price">$5.50</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>
     
    <div class="partyorder">
        <img src="photos/eclair.jpg " height="120" width="120" alt="">
        <h2>Chocolate Eclair</h2>
        <div class="price">$5.50</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

    <div class="partyorder">
        <img src="photos/danish.jpg " height="120" width="120" alt="">
        <h2>Danish Assorted Fruit $  Custard</h2>
        <div class="price">$5.50</div>
        <a href="add_to_cart.php" class="button">Add to cart</a>
    </div>

</div>
                        

            
</body>
</html>
