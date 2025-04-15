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

// Fetch product details for updating
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM addmenu WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $row['image'];

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

    // Update product in the database
    $stmt = $conn->prepare("UPDATE addmenu SET name = ?, price = ?, category = ?, image = ? WHERE id = ?");
    $stmt->bind_param("ssdsi", $name, $price, $category, $image, $id);

    if ($stmt->execute()) {
        echo "Product updated successfully!";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
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

.btn:hover{
    background: var(--black);

}

.updatebtn{
    display: block;
    width: 100%;
    cursor: pointer;
    border-radius: .5rem;
    margin-top: 1rem;
    font-size: 1.7rem;
    padding: 1rem 3rem;
    background: var(--green);
    color: var(--white);
    text-align: center; 
}

.updatebtn:hover{
    background: var(--black);

}
.container{
 max-width: 1200px;
 padding: 2rem;
 margin:0 auto;

}
.admin-product-form-container .centered{
display: flex;
align-items: center;
justify-content: center;
min-height: 100vh;
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

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product - Bakery Admin</title>
</head>
<body>

<div class="container">
    <div class="admin-product-form-container centered">
        <form action="" method="POST" enctype="multipart/form-data">
            <h2>Update Product</h2>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label for="name" class="table">Product Name:</label>
            <input type="text" name="name" id="name" class="box" value="<?php echo $row['name']; ?>" required><br><br>

            <label for="price" class="table">Price:</label>
            <input type="number" step="0.01" name="price" id="price" class="box" value="<?php echo $row['price']; ?>" required><br><br>

            <label for="category" class="table">Category:</label> 
            <select name="category" id="category" class="box" required>
                <option value="Partyorders" <?php if ($row['category'] == 'Partyorders') echo 'selected'; ?>>Partyorders</option>
                <option value="Pies" <?php if ($row['category'] == 'Pies') echo 'selected'; ?>>Pies</option>
                <option value="Breakfast" <?php if ($row['category'] == 'Breakfast') echo 'selected'; ?>>Breakfast</option>
                <option value="Donuts" <?php if ($row['category'] == 'Donuts') echo 'selected'; ?>>Donuts</option>
                <option value="Cakes" <?php if ($row['category'] == 'Cakes') echo 'selected'; ?>>Cakes</option>
            </select><br><br>

            <label for="image" class="table">Product Image:</label>
            <input type="file" name="image" id="image" accept="image/*" class="box"><br><br>
            <?php if (!empty($row['image'])): ?>
                <img src="<?php echo $row['image']; ?>" alt="Current Image" style="max-width: 100px;"><br><br>
            <?php endif; ?>

            <input type="submit" class="updatebtn" value="Update Product">
            <a href="index.php" class="btn">Go Back</a>
        </form>
    </div>
</div>

</body>
</html>
