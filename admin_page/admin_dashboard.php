<?php
// Start the session
session_start();

// Include database connection
include 'db_connection.php';

// Query to check if any admin is registered
$sql = "SELECT * FROM users WHERE is_admin = 1";
$result = $con->query($sql);

// If no admin is registered, redirect to register page
if ($result->num_rows === 0) {
    header("Location: register.php");
    exit();
}

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to login page if not logged in
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        nav {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        nav a {
            margin: 0 15px;
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
            background-color: #e7e7e7;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #ddd;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #e7e7e7;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>

        <nav>
            <a href="manage_products.php">Manage Products</a>
            <a href="manage_categories.php">Manage Categories</a>
            <a href="manage_orders.php">Manage Orders</a>
            <a href="manage_users.php">Manage Users</a>
            <a href="logout.php">Logout</a>
        </nav>

        <!-- Page content goes here -->
        
        <div class="footer">
            &copy; 2024 E-Commerce Platform. All rights reserved.
        </div>
    </div>
</body>
</html>