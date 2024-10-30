<?php
include('../includes/db_conn.php');

if (isset($_POST['Register'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $query = "INSERT INTO users (FirstName,LastName,Email,Password,Phone) VALUES ('$username','$name','$email','$password','$phone')";

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            overflow: hidden;
        }

        .full-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e0e0e0;
        }

        .container {
            position: relative;
            width: 100%;
        }

        .container img {
            width: 100%;
            border-radius: 10px;
        }

        .white-box {
            position: absolute;
            top: 48%;
            left: 70%;
            transform: translate(-150%, -50%);
            width: 40%;
            height: 60%;
            /* Adjust height as needed */
            background-color: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group{
           padding: 20px;
           text-align: center;
        }

        input[type="text"]{
            width: 230px;
            height: 50px; 
            border-top: none;
            border-right: none;
            border-left: none;
            border-bottom: 1px solid black;
            outline: none;
        }

        input[type="email"]{
            width: 467px;
            height: 50px;
            border-top: none;
            border-right: none;
            border-left: none;
            border-bottom: 1px solid black;
            outline: none;
        }

        input[type="password"]{
            width: 467px;
            height: 50px;
            border-top: none;
            border-right: none;
            border-left: none;
            border-bottom: 1px solid black;
            outline: none;
        }

        input[type="tel"]{
            width: 467px;
            height: 50px;
            border-top: none;
            border-right: none;
            border-left: none;
            border-bottom: 1px solid black;
            outline: none;
        }

        a {
            margin: 5rem;
            color: gray;
        }
    </style>
</head>

<body>
    <div class="full-container">

        <div class="container">
            <img src="../Image/pic.jpg" alt="this is an image">

            <div class="white-box">
                <center>
                    <h2 class="mt-3">Sign Up</h2> <br>
                </center>

                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" placeholder="First Name" class="input" name="username" required>

                            <input type="text" placeholder="Last Name" class="input" name="name" required><br> <br>

                            <input type="email" placeholder="Your Email" class="input" name="email" required><br> <br>

                            <input type="password" placeholder="Password" class="input" name="password" required ><br> <br>

                            <input type="tel" placeholder="Phone" class="input" name="phone" required><br> <br>

                            <div class="btn">
                            <input type="submit" value="Register" class="btn btn-danger btn-lg" name="Register">

                            <a href="login.php">I am already a member.</a>
                            </div>
                    </form>
            </div>
        </div>
    </div>

    </div>
</body>

</html>