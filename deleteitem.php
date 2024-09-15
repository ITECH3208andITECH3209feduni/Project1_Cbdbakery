<?php
include("cbdconnection.php");
if(isset($_GET['dltid']))
{
    $dltid=$_GET['dltid'];
    $dlt="DELETE FROM additem WHERE productid='$dltid'";
    $run_dlt=mysqli_query($con,$dlt);
    if($run_dlt===true){
        header("location:fooditem_list.php");
        echo "record has been deleted succesfully";
    }
    else{
        echo "failed to delete try again";
    }
}
?>