<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'cbdbakery';

//create connection 
$conn = mysqli_connect($host, $user, $pass, $dbname);
    if(isset($_POST['search']))
    ?>

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