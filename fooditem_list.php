
<style>
    * {
    box-sizing: border-box;
  }
  
  html.open, body.open {
    height: 100%;
    overflow: hidden;
  }
  
  html {
    padding: 40px;
    font-size: 62.5%;
  }
  
  body {
    padding: 20px;
    background-color:pink;
    line-height: 0.8;
    -webkit-font-smoothing: antialiased;
    color: black;
    font-size: 1.6rem;
    font-family: "Playfair Display", serif;
  }
  
  p {
    text-align: center;
    margin: 20px 0 60px;
  }
  
  main {
    background-color: black;
  }
  
  h1 {
    text-align: end;
    font-weight: 0;
  }
  
  table {
    display: block;
  }
  
  tr, td, tbody, tfoot {
    display: block;
  }
  
  thead {
    display: none;
  }
  
  tr {
    padding-bottom: 10px;
  }
  
  td {
    padding: 5px 5px 0;
    text-align: center;
  }
  td:before {
    content: attr(data-title);
    color: #7a91aa;
    text-transform: uppercase;
    font-size: 2.5rem;
    padding-right: 10px;
    display: block;
  }
  
  table {
    width: 100%;
  }
  
  th {
    text-align: left;
    font-weight: 700;
  }
  
  thead th {
    background-color: #202932;
    color: #fff;
    border: 1px solid #202932;
  }
  
  tfoot th {
    display: block;
    padding: 10px;
    text-align: center;
    color: #b8c4d2;
  }
  
  .button {
    line-height: 1;
    display: inline-block;
    font-size: 1.5rem;
    text-decoration: none;
    border-radius: 7px;
    color: #fff;
    padding: 8px;
    background-color: black;
  }

  .button:hover{
    background-color: lightblue;
    color: black ;
  }

  
 
  .select {
    padding-bottom: 80px;
    border-bottom: 5px solid #28333f;
  }
  .select:before {
    display: none;
  }

  .select:hover{
    color: darkcyan;
  }
  
  
  @media (min-width: 300px) {
    td {
      text-align: left;
    }
    td:before {
      display: inline-block;
      text-align: right;
      width: 140px;
    }
  
    .select {
      padding-left: 160px;
    }
  }
  @media (min-width: 720px) {
    table {
      display: table;
    }
  
    tr {
      display: table-row;
    }
  
    td, th {
      display: table-cell;
    }
  
    tbody {
      display: table-row-group;
    }
  
    thead {
      display: table-header-group;
    }
  
    tfoot {
      display: table-footer-group;
    }
  
    td {
      border: 1px solid white;
    }
    td:before {
      display: none;
    }
  
    td, th {
      padding: 10px;
    }
  
    tr:nth-child(n+0) td {
      background-color:white;
    }
  
    tfoot th {
      display: table-cell;
    }
  
    .select {
      padding: 10px;
    }
  }
  
  
body {
    font-family: "playfree Display";
    margin: 0;
    padding: 0px;
 }
  
  .navbar {
    
    background-color: #333; 
    width: 5%;
    height: 50px;
  }
  
  .navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }
  
  .subnav {
    float: left;
    overflow: hidden;
  }
  
  .subnav .subnavbtn {
    font-size: 16px;  
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
  }
  
  .navbar a:hover, .subnav:hover .subnavbtn {
    background-color:#055755;
  }
  
  .subnav-content {
    display: none;
    position: absolute;
    left: 0;
    background-color:#055755;
    width: 100%;
    z-index: 1;
  }
  
  .subnav-content a {
    float: left;
    color: black;
    text-decoration: none;
  }
  
  .subnav-content a:hover {
    background-color: #eee;
    color: black;
  }
  
  .subnav:hover .subnav-content {
    display: block;
  }
  
  .ss{
    width: 450px;
    height: 40px;
    margin-left:10%;
    color: darkcyan;
    font-size: 25px;
  }

  .sa{
    width: 85px;
    height: 45px;
    margin-left:3%;
    cursor: pointer;
    display: inline-block;
    text-decoration: none;
    border-radius: 10px;
    color: #fff;
    padding: 8px;
    background-color: #4b908f ;
    font-size: 20px;
  }

  .sa:hover{
    background-color: #4ecac8 ;
    color: white ;
  }

  a:link, a:visited{
  text-decoration: none;
  color:white;
}

    </style>

<?php
// Load the database configuration file
include_once 'cbdconnection.php';

?>



<div class="navbar">
   
  <a href="admin_page.php" onclick="return">BACK</a>

</div>

<br><br>
<h1 style="text-align:center; color:black;"> Product&nbsp; List</h1>

<!-- Display status message -->
<?php if(!empty($statusMsg)){ ?>
<div class="col-xs-12">
    <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
</div>
<?php } ?>


    <!-- Data list table --> 
    <table class="table table-striped table-bordered">

    <tr>
        <form action="" method="post">
            
            <td colspan="3"><button class="button"><a href="additem.php">Addmore</button></a></td>
            <td colspan="3"><button class="button"><a href="login.html">Logout</a></button></td>
            </form>
        </tr>
        <tr style="font-weight: bolder; font-size: 2.8rem;">
            <td>Product id</td>
            <td>Image</td>
            <td>Product_name</td>
            <td>Price</td>
            <td>Product Type</td>
            <td>Delete</td>
            <td>Edit</td>
        </tr>
        
        <tbody>
        <?php
        // Get member rows
        $query="SELECT * FROM fooditem_list ORDER BY productid DESC";
        $result = mysqli_query($conn,$query); 
        
        
        {
                
          $productid=$row['productid'];
          $picture=$row['image'];
          $product_name=$row['product_name'];
          $price=$row['price'];
          $product_type=$row['product_type'];
      }
        
        ?> 
        
        <tr>
                 
                 <td><?php echo $productid ?></td>
                 <td><img src=<?php echo "photos/$image;"?> height=100 width=100></td>
                 <td><?php echo $product_name ?></td>
                 <td><?php echo $price ?></td>
                 <td><?php echo $product_type ?></td>
                 
                 <td><button class="button"><a href="deleteproduct.php?dltid=<?php echo $productid; ?>"class="btn btn-danger"
                 onclick="return confirm('delete');">Delete</a></button></td>
                 <td><button class="button"><a href="editproduct.php?editid=<?php echo $productid; ?>"class="btn btn-primary">Edit</a></button></td>
             </tr>
        
        </tbody>
      
    </table>
</div>

