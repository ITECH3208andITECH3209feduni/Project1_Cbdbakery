<?php

include("cbdconnection.php");
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
    background-image: url('photos/bg5.jfif');
    background-size: cover;
    background-attachment: fixed;
    background-position: center top;
    background-color: #f4f4f4;
    background-repeat: no-repeat;
    margin: 0;
   padding: 0;
   font-family: Arial, sans-serif;
}

h1 {
    
    position: fixed;
            left: 50%;
           margin-top: 5px;
            transform: translate(-50%, -50%);
            font-size: 3rem;
            color: red;
            font-weight: bold;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 5px;
    
    

}

/* Table Styles */
table {
    width: 80%;
    margin: 30px auto;
    border-collapse: collapse;
    background-color: none;
    border: 1px solid #ddd;
}


th, td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
    color: red;
    font-size: 22px;
}

td {
    font-size: 18px;
    color: #333;
}

img {
    border-radius: 15px;
}   
        .btn {
            line-height: 2;
            display: inline-block;
            font-size: 1.8rem;
            text-decoration: none;
            border-radius: 10px;
            color: black;
            padding: 8px;
            background-color: lightblue;
            font-size: 20px;
            font-weight: bold;
        }
        .btn:hover {
            color: black;
        }
    </style>

<body>
<a href="categorypage.php" class="btn">Back</a>
    <h1 style="text-align:center; color:red;">Hot Breakfast</h1>

    <table cellspacing="0" cellpadding="10" style="width:100%; margin:auto;">
        <tr>
            <th style="text-align:center;font-size:22px;color:red;">Image</th>
            <th style="text-align:center;width:130px;font-size:22px;color:red;">Food Item</th>
            <th style="text-align:center;width:130px;font-size:22px;color:red;">Price</th>
            <th style="text-align:center;font-size:22px;color:red;">Action</th>
        </tr>

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
                  foreach ($products as $product) 
            echo <tr>
                <td style="text-align:center;"><img src="photos/fruit.jfif" height="150" width="150" alt=" fruit.jfif "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Fruit Toast</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$6.00</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>

                </tr>
                <tr>
                <td style="text-align:center;"><img src="photos/ham.jfif" height="150" width="150" alt=" ham.jfif "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Ham & Cheese Croissant</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$8.50</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/hamcheese.jfif" height="150" width="150" alt=" hamcheese.jfif"></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Ham, Cheese, Tomato Toastie</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$8.20</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/eggbacon.jpg" height="150" width="150" alt=" eggbacon.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;"> Doubleegg & Bacon Roll</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$13.50</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/banana.jpg" height="150" width="150" alt=" banana.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;"> Banana Bread</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$6.00/td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/tomato.jfif" height="150" width="150" alt=" tomato.jfif "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Cheese & Tomato Croissant</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$8.50</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/baconegg.jpg" height="150" width="150" alt=" baconegg.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Egg, Bacon & Cheese Muffin</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$6.80</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

               



        ?>

    </table>
</body>
</html>
