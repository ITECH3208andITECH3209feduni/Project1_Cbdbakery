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
    background-image: url('photos/bg4.jpg');
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
    <h1 style="text-align:center; color:red;">Cakes and Slices</h1>

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
            ["croissant.jfif", "croissant",  5.80],
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
            echo <tr>
                <td style="text-align:center;"><img src="photos/date.jpg" height="150" width="150" alt=" date.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Date Scone</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$3.20</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>

                </tr>
                <tr>
                <td style="text-align:center;"><img src="photos/plainscone.jpg" height="150" width="150" alt=" plainscone.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Plain Scone</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$3.00</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/jamcream.jpg" height="150" width="150" alt=" jamcream.jpg"></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Scone with jam & cream</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$ 5.00</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/cupcake.jfif" height="150" width="150" alt=" cupcake.jfif "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Cupcake with Lcing</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$3.60</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/buttercake.jpg" height="150" width="150" alt=" buttercake.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Cupcake with Butter cream</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$4.60</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/brownie.jpg" height="150" width="150" alt=" brownie.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Brownie</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$5.00</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/cherry.jpg" height="150" width="150" alt=" cherry.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Cherry Slice</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$4.80</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/caramel.jpg" height="150" width="150" alt=" caramel.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Caramel Roll</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$4.90</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/hedgehog.jpg" height="150" width="150" alt=" hedgehog.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Hedgehog Slice</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$4.90</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/lemon.jpg" height="150" width="150" alt=" lemon.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Lemon Slice</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$4.80</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/croissant.jfif" height="150" width="150" alt=" croissant.jfif "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;"> Croissant </td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$5.00</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/almond.jpg" height="150" width="150" alt=" almond.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Almond Crossiant </td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$5.80</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/chocolate.jpg" height="150" width="150" alt=" chocolate.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Chocolate Croissant </td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$5.40</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/orange.jpg" height="150" width="150" alt=" orange.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Flourless Almond and Orange cake</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$4.80</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/assortedvegan.jpg" height="150" width="150" alt=" assortedvegan.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Assorted Vegan and Gluten free Slices</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$6.00</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/tart.jfif" height="150" width="150" alt=" tart.jfif "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Jam Tart</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$3.50</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/neenish.jpeg" height="150" width="150" alt=" neenish.jpeg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Neenish Tart</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$3.80</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/crackle.jpg" height="150" width="150" alt=" crackle.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Chocolate Crackle</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$3.80</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/honey.jpg" height="150" width="150" alt=" honey.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Honey Joy</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$3.80</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/apple.jpg" height="150" width="150" alt=" apple.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Apple Scroll</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$4.80</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/coffee.jpg" height="150" width="150" alt=" coffee.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Coffee Scroll</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$4.80</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/cookies.jpg" height="150" width="150" alt=" cookies.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">cookies</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$6.00</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/custard.jfif" height="150" width="150" alt=" custard.jfif"></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Custard Tart</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$4.80</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/vanilla.jpg" height="150" width="150" alt=" vanilla.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">vanilla Slices</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$4.90</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/applecake.jfif" height="150" width="150" alt=" applecake.jfif "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Apple Cake</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$5.00</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/lamington.jpg" height="150" width="150" alt=" lamington.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Lamington</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$4.80</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/muffin.jpg" height="150" width="150" alt=" muffin.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Muffin</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$5.50</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/eclair.jpg" height="150" width="150" alt=" eclair.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Chocolate Eclair</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$5.00</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>

                <tr>
                <td style="text-align:center;"><img src="photos/danish.jpg" height="150" width="150" alt=" danish.jpg "></td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">Danish Assorted Fruit $  Custard</td>
                <td style="text-align:center;color:black;font-size:20px;width: 250px;">$5.30</td>
                <td style="text-align:center;"><a href="#" class="btn">Add to cart</a></td>
                </tr>
        ?>

    </table>
</body>
</html>
