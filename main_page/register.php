<?php
include('../includes/db_conn.php');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO userdata (username,email,password) VALUES ('$username','$email','$password')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script type='text/javascript'>
        alert('Registration Successfull.');
        window.location.href='login.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Registration UnSuccessfull.');
        window.location.href='register.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../includes/styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        input[type="text"] {
            width: 300px;
            height: 45px;
            font-size: 16px;
            box-sizing: border-box;
            padding: 10px;
            outline: none;
        }

        .register-side input {
            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: 1px solid gray;
            padding: 10px;
            outline: none;
            border-radius: 0;
        }

        .wrapper {
            display: flex;
            align-items: center;
            height: 100vh;
        }

        .image-left {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-left img {
            max-width: 100%;
            height: auto;
        }

        .register-side {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        input[type="button"] {
            width: 120px;
            height: 45px;
            border: 1px solid #ccc;
            background-color: #380651;
            color: white;
            cursor: pointer;
        }

        a {
            margin: 10rem;
            color: gray;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="image-left">
            <img src="../Image/signup-image.jpg" alt="this is an image">
        </div>

        <div class="register-side">
            <h2>Sign Up</h2>

            <form action="" method="post">
                <i class="fa-solid fa-user"></i><input type="text" placeholder="Your Name" class="input" name="username" required> <br> <br>

                <i class="fa-solid fa-envelope"></i><input type="email" placeholder="Your Email" class="input" name="email" required><br> <br>

                <i class="fa-solid fa-lock"></i><input type="password" placeholder="Password" class="input" name="password" required><br> <br>

                <i class="fa-solid fa-user-lock"></i><input type="password" placeholder="Confirm Password" class="input" name="confirm_password" required><br> <br>

                <input type="checkbox" name="statement"> I agree to all statements in <u>Terms of Service</u> <br> <br>

                <input type="submit" value="Register" name="register">
                <a href="login.php">I am already a member.</a>
            </form>
        </div>
    </div>
</body>

</html>