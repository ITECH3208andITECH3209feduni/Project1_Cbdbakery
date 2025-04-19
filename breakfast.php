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
            ["fruit.jfif", "fruit toast", 6.00],
            ["ham.jfif", "ham & cheese croissant", 8.50],
            ["hamcheese.jfif", "ham, cheese, tomato toastie ", 8.20],
            ["eggbacon.jpg","double egg & bacon roll",  13.50],
            ["banana.jpg","banana bread",  6.00],
            ["tomato.jfif", "cheese & tomato croissant",  8.50],
            ["baconegg.jpg", "egg, bacon & cheese muffin",  6.80],
            


               ];

              // Loop through each product and generate a table row
                  foreach ($products as $product); 
                  ?>