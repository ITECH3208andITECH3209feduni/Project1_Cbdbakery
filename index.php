<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'cbdbakery';

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



