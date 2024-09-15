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
    
    background-position: center top;
    background-color: black;
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
    <h1 style="text-align:center; color:red;"> Dounts</h1>

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
            ["cinnamon.jfif", "cinnamon", 2.20],
            ["filleddonut.jfif", "mini filled", 3.80],
            ["icedjam.jfif", "iced jam ball ", 4.80],
            ["iced.jfif","iced",  2.60],
            ["jam.jpg","jam ball",  4.60],
            ["jhon.jpg", "long john",  5.00],
            
            


               ];

              // Loop through each product and generate a table row
                  foreach ($products as $product) 
            echo <tr>
                <td style="text-align:center;"><img src="photos/cinnamon.jfif" height="150" width="150" alt=" cinnamon.jfif "></td>
                <td style="text-align:center;color:white;font-size:20px;width: 250px;">cinnamon</td>
                <td style="text-align:center;color:white;font-size:20px;width: 250px;">$2.20</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>

                </tr>
                <tr>
                <td style="text-align:center;"><img src="photos/filleddonut.jfif" height="150" width="150" alt=" filleddonut.jfif "></td>
                <td style="text-align:center;color:white;font-size:20px;width: 250px;">Mini Filled</td>
                <td style="text-align:center;color:white;font-size:20px;width: 250px;">$3.80</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/icedjam.jfif" height="150" width="150" alt=" icedjam.jfif"></td>
                <td style="text-align:center;color:white;font-size:20px;width: 250px;">Iced Jam Ball</td>
                <td style="text-align:center;color:white;font-size:20px;width: 250px;">$4.80</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/iced.jfif" height="150" width="150" alt=" iced.jfif "></td>
                <td style="text-align:center;color:white;font-size:20px;width: 250px;"> Iced</td>
                <td style="text-align:center;color:white;font-size:20px;width: 250px;">$2.60</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/jam.jpg" height="150" width="150" alt=" jam.jpg "></td>
                <td style="text-align:center;color:white;font-size:20px;width: 250px;"> Jam Ball</td>
                <td style="text-align:center;color:white;font-size:20px;width: 250px;">$4.60</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/jhon.jpg" height="150" width="150" alt=" jhon.jpg "></td>
                <td style="text-align:center;color:white;font-size:20px;width: 250px;">long john</td>
                <td style="text-align:center;color:white;font-size:20px;width: 250px;">$5.00</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

               

               



        ?>

    </table>
</body>
</html>
