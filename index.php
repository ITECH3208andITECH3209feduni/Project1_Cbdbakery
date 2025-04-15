<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'cbd_bakery';

// Create connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = '';

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        
        // Create the uploads directory if it doesn't exist
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file;
        } else {
            echo "Error: Unable to upload the file.";
        }
    }

    // Insert product into the database
    $stmt = $conn->prepare("INSERT INTO addmenu (name, price, category, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $price, $category, $image);

    if ($stmt->execute()) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Prepare the SQL statement with a placeholder
    $stmt = $conn->prepare("DELETE FROM addmenu WHERE id = ?");
    
    // Bind the parameter
    $stmt->bind_param("i", $id);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to index.php after successful deletion
        header('location:index.php');
        exit();
    } else {
        echo "Error: Could not delete the product.";
    }
}

$conn
?>


<style>

:root{
 --green:#27ae60;
 --black:#333;
 --white:#fff;
 --bg-color:#eee;
 --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
 --border:.1rem solid var(--black);
     
}

html{
font-size:62.5%;
overflow-x:hidden;

}

.btn{
    display: block;
    width: 100%;
    cursor: pointer;
    border-radius: .5rem;
    margin-top: 1rem;
    font-size: 1.7rem;
    padding: 1rem 3rem;
    background: var(--green);
    color: var(--white);
}

.btn:hover{
    background: var(--black);

}

.btn2{
    display: block;
    width: 88%;
    cursor: pointer;
    border-radius: .5rem;
    margin-top: 1rem;
    font-size: 1.7rem;
    padding: 1rem 3rem;
    background: var(--green);
    color: var(--white);
    text-align: center; 

}

.btn2:hover{
    background: var(--black);

}

.btn1{
    display: block;
    width: 80%;
    cursor: pointer;
    border-radius: .5rem;
    margin-top: 1rem;
    font-size: 1.7rem;
    padding: 1rem 3rem;
    background: var(--green);
    color: var(--white);
}

.btn1:hover{
    background: var(--black);

}

.container{
 max-width: 1200px;
 padding: 2rem;
 margin:0 auto;

}

.admin-product-form-container form{
max-width: 50rem;
margin:0 auto;
padding: 2rem;
border-radius: .5rem;
background: var(--bg-color);

}

.admin-product-form-container form h2{
    text-transform: uppercase;
    color:var(--black);
    margin-bottom: 1rem;
    text-align: center;
    font-size: 2.5rem;
}

.admin-product-form-container form .box{
    width: 60%;
    border-radius: .5rem;
    padding: 1.2rem 1.5rem;
    font-size: 1.5rem;
    margin: 1rem 0;
    background: var(--white);
    text-transform: none;
}

.admin-product-form-container form .table{
    
    border-radius: .5rem;
    padding: 1.2rem 1.5rem;
    font-size: 1.7rem;
    margin: 1rem 0;
    text-transform: none;
}

.product-display {
    margin:2rem 0;
    overflow-y: scroll; 
}

.product-display .product-display-table{
width:100%;
text-align:center;

}

.product-display .product-display-table thead{
    
    background: var(--bg-color);

}
.product-display .product-display-table th{
  padding:1rem; 
  font-size:2rem;
 
}

.product-display .product-display-table td{
  padding:1rem; 
  font-size:2rem;
  border-bottom: var(--border);

}

.product-display .product-display-table .btn1:first-child{
     margin-top: 0; 
     
}

.product-display .product-display-table .btn1:last-child{
     background: red; 
     
}

.product-display .product-display-table .btn1:last-child:hover{
     background: var(--black); 
     
}

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Bakery Admin</title>
</head>
<body>

<div class="container">
    <div class="admin-product-form-container">
    
    <form action="" method="POST" enctype="multipart/form-data">
    <h2>Add Product</h2>
        <label for="name" class="table">Product Name:</label>
        <input type="text" name="name" id="name" class="box" required><br><br>

        <label for="price" class="table">Price:</label>
        <input type="number" step="0.01" name="price" id="price" class="box" required><br><br>

        <label for="category" class="table">Category:</label> 
        <select name="category" id="category" class="box" required>
             <option value="Partyorders">Partyorders</option> 
            <option value="Pies">Pies</option>
            <option value="Breakfast">Breakfast</option>
            <option value="Donuts">Donuts</option>
            <option value="Cakes">Cakes</option>
            
           
            
        </select><br><br>

        <label for="image" class="table">Product Image:</label>
        <input type="file" name="image" id="image" accept="image/*"  class="box"><br><br>

        <input type="submit" class="btn" value="Add Product">
        <a href="mainadmin.php" class="btn2">Go Back</a>
    </form>
</div>
<?php
   $select = $conn->prepare("SELECT * FROM addmenu"); 
   $select->execute();
   $result = $select->get_result(); // Get the result set from the executed statement
?>

<div class="product-display">

    <table class="product-display-table">
        <thead>
            <tr> 
                <th>Product Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr> 
                <td><img src="<?php echo $row['image']; ?>" height="100" alt=""></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td>  <a href="adminupdate.php?edit=<?php echo $row['id'];?>" class="btn1"> <i class="fas fa-edit"></i>Edit</a>
                      <a href="index.php?delete=<?php echo $row['id'];?>" class="btn1"> <i class="fas fa-trash"></i>Delete</a>
            </td>
            </tr>
        <?php
        }
        ?> 
    </table>

</div>

</table>


 </div>



    </div>

    
</body>
</html>
