<?php


include ("cbdconnection.php");

if (isset($_GET['editid']))
{
    $editid= $_GET['editid'];
    $query="SELECT * FROM additem WHERE productid='$editid'";
    $run_edit=mysqli_query($con,$query);
    $row_edit=mysqli_fetch_array($run_edit);
    /*print_r($run_edit); */
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Edit Item</title>
</head>
<body>
<h1>Edit Item Details</h1>


   <table>
       <form action="" method="POST" enctype="multipart/form-data">

       <tr>
                <td>Image:</td>
                <td>
                    <img src="photos/<?php echo  $row_edit['image'] ?>" hight=50 width=50>
                    <input type= "file" name="image" ID="file">
                </td>
            </tr>

               <tr>
                   <td>Product Name:</td>
                   <td>
                       <input type="hidden" name="productid" value="<?php echo $row_edit['productid'] ?>" >
                       <input type="text" name="product_name" value="<?php echo $row_edit['product_name'] ?>">
                   </td>
               </tr>

            <tr>
                <td>Price:</td>
                <td>
                    <input type="text" name="price" value="<?php echo $row_edit['price'] ?>">
                </td>
            </tr>
            
            <tr>
                <td>Product Type:</td>
                <td>
                    <input type="text" name="product_type" value="<?php echo $row_edit['product_type'] ?>">
                </td>
            </tr>
            
            <tr>
            <td><input type="submit" value="submit" name="submit"></td>  
            <td><input type="reset" value="RESET" name="reset"> </td>

            </tr>
       </form>
   </table>



<?php 
if (isset($_POST['submit']))
{
    $productid=$_POST['productid'];
    $image=$_FILES['image']['name'];
    $product_name=$_POST['product_name'];
    $price=$_POST['price'];
    $product_type= $_POST['product_type'];
    

    if (empty($image))
    {
       echo $update="UPDATE additem SET product_name='$product_name', price='$price',   product_type='$product_type'  WHERE productid='$productid'";
    }
    else 
    {
        echo $update="UPDATE additem SET product_name='$product_name', price='$price',   product_type='$product_type'  WHERE productid='$productid'";
     }
    $run_update=mysqli_query($con,$update);
    if ($run_update===true)
    {
        echo "Data Has Been Upadated";
        move_uploaded_file($_FILES['image']['tmp_name'],"imagepic/$image");
        header("location:fooditem_list.php");
    }
    else
    {
        echo "Fail, Try again";
    }

}
?>
   
</body>
</html>