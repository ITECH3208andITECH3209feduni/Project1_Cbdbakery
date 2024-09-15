<?php
session_start();
error_reporting(0);
include('cbdconnection.php');
if(isset($_POST['submit']))
{
   echo $productid=$_POST['productid'];
   echo $image=$_FILES['image']['name'];
   echo $product_name=$_POST['product_name'];
   echo $price=$_POST['price'];
   echo $product_type=$_POST['product_type'];
   
    $C= "insert into fooditem_list (productid, image, product_name, price, product_type) values ('$productid', '$image', '$product_name', '$price', '$product_type')";
    if(mysqli_query($con, $C))
    { 
        move_uploaded_file($_FILES['image']['tmp_name'], "photos/$image") ;
        echo "<script>('Image has been uploaded successfully'); window.location.href ='additem.php'; </script>" ;

    }
    else     {
        echo "<script>alert('Image has not uploaded')</script>";
    }
}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
</head>
<style>
body{
    margin: 0;
    padding: 0;
    background: url(imagepic/bg1.jpg);
    background-size: 1000%;
    background-position-x: center;
    background-position: center;
    background-repeat: no-repeat;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

table{
    background-position: center;
    border-color: black;
    position:absolute;
    left: 35%;
     bottom: 50%;
     padding: 1%;
    border: none;
    border-bottom: 10px solid black;
    border-top: black 10px solid;
    border-right: black 10px solid;
    border-left: black 10px solid;
    border-radius: 10px;
    border-style: solid;
    border-left: solid 3px black;

}
</style>
<body>
    <form action="additem.php" method="POST" enctype="multipart/form-data">
    <table>
    <h1>Add Item</h1>
    <tr>
    <td>Product Id</td>
    <td><input type="text" name="productid"></td>
    </tr>

    <tr>
    <td>Image</td>
    <td><input type="file" name="image"></td>
    </tr>
    
    <tr>
    <td>Product Name</td>
    <td><input type="text" name="product_name"></td>
    </tr>
    
    <tr>
        <td>Price</td>
        <td><input type="text" name="price"></td>
    </tr>

        <tr>
        <td>Product Type</td>
        <td>
    <select name="product_type" id="product_type">
        <option value="partyorder">Party order</option>
        <option value="pies">Pies</option>
        <option value="breakfast">Hot Breakfast</option>
        <option value="donuts">Donuts</option>
        <option value="cakes">Cakes and Slices</option>
</select>
</td>
    </tr>
    <tr>
    <td colspan="2"><input type="submit" name="submit"></td>
    </tr>
   
    </table>
    </form>
</body>
</html>