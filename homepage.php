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