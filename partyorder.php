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