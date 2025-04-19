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
            ["cinnamon.jfif", "cinnamon", 2.20],
            ["filleddonut.jfif", "mini filled", 3.80],
            ["icedjam.jfif", "iced jam ball ", 4.80],
            ["iced.jfif","iced",  2.60],
            ["jam.jpg","jam ball",  4.60],
            ["jhon.jpg", "long john",  5.00],
            
            


               ];

              // Loop through each product and generate a table row
                  foreach ($products as $product) 
?>