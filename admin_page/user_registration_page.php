<?php
// Start the session
session_start();

// Connect to the database
include 'db_connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Plain text password

    // Validate inputs (basic validation)
    if (empty($name) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); //hashing makes it easier to store characters into database.

    // Prepare and execute the SQL statement to check if the email already exists
    $stmt = $connection->prepare("SELECT id FROM users WHERE email = ?"); //Prepares the SQL statement with a placeholder ? for the email.
    $stmt->bind_param("s", $email); //Binds the email variable to the placeholder.
    $stmt->execute(); //Executes the prepared statement.
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Email already exists. Please use a different email.";
        $stmt->close();
    } else {
        // Prepare and execute the SQL statement to insert new user
        $stmt = $connection->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashed_password);
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    // Close the database connection
    $connection->close();
}
?>
