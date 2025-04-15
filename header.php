<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            padding-top: 60px; /* Ensure content isn't hidden under the fixed header */
        }

        .header {
            position: fixed;
            top: 0;
            width: 100%;
            height: 60px;;
            background-color: white; /* Default color */
            padding: 5px 0; /* Default padding */
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            transition: background-color 0.3s ease, padding 0.3s ease; /* Smooth transitions */
        }

        .header.scrolled {
            background-color: #f0f0f0; /* Color when scrolled */
            padding: 0px 0; /* Smaller padding when scrolled */
        }

        .logo {
            display: flex;
        }

        .logo img {
            height: 50px; /* Smaller logo size when scrolled */
            width: auto;
            transition: height 0.3s ease; /* Smooth transition for logo size */
        }

        .header.scrolled .logo img {
            height: 40px; /* Smaller logo size when scrolled */
        }

        .nav-menu {
            display: flex;
            align-items: center;
        }

        .nav-menu a {
            text-decoration: none;
            font-family: italic bold;
            margin: 0 15px; /* Adjusted margin */
            color: #333; /* Text color */
            position: relative;
            font-size: 20px;
            transition: color 0.3s ease; /* Smooth transition for hover effect */
        }

        .nav-menu a:hover {
            color: #555; /* Hover color */
        }
        .header.scrolled.nav-menu a {
            
            font-size: 15px;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 35px;
            background-color: #fff;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            padding: 10px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .search-cart {
            display: flex;
            align-items: center;
        }

        .search-bar {
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .cart-icon {
            margin-left: 20px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    

</body>
</html>
