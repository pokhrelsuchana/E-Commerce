<?php
include('../includes/db_conn.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['Login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND Password='$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {

        if (!empty($_POST["Remember_Me"])) {
            setcookie("email", $email, time() + 60 * 60 * 24 * 30);
            setcookie("password", $password, time() + 60 * 60 * 24 * 30);
        } else {
            setcookie("email", "", time() - 1);
            setcookie("password", "", time() - 1);
        }

        echo "<script type='text/javascript'>
            alert('Login Successful.');
            window.location.href = '../index.php';
        </script>";
    } else {

        echo "<script type='text/javascript'>
            alert('Login Failed');
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            overflow: hidden;
        }

        .form-control {
            border: none;
        }

        input[type="email"] {
            display: block;
            padding: 0 26px;
            background: transparent;
            font-family: Montserrat-Regular;
            font-size: 18px;
            color: #555555;
            line-height: 1.2;
            outline: none;
            border: 1px solid #e6e6e6;
            height: 80px;
            flex-wrap: wrap;
            border-radius: 10px;
            align-items: flex-end;
            width: 500px;
            transition: width 0.3s ease, height 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
        }

        input[type="password"] {
            display: block;
            padding: 0 26px;
            background: transparent;
            font-family: Montserrat-Regular;
            font-size: 18px;
            color: #555555;
            line-height: 1.2;
            outline: none;
            border: 1px solid #e6e6e6;
            height: 80px;
            flex-wrap: wrap;
            border-radius: 10px;
            align-items: flex-end;
            width: 500px;
            transition: width 0.3s ease, height 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            width: 500px;
            height: 90px;
            border-color: #007bff;
            background-color: #f9f9f9;
        }

        .full-container {
            display: flex;
            align-items: center;
            height: 100vh;
        }

        .image-side {
            flex: 1;
            display: flex;
        }

        .image-side img {
            width: 100%;
            height: auto;
        }

        .login-side {
            flex: 1;
            padding: 30px;
            margin-top: 70px;
            display: flex;
            flex-direction: column;
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .class a {
            background-color: #2c0042;
            color: #fff;
            font-size: 20px;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
        }

        i {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="full-container"> <!--for all the div-->

        <div class="image-side"> <!--for the image -->
            <img src="../Image/image.jpeg" alt="this is an image">
        </div>

        <center>
            <div class="login-side">
                <h2>Login to Continue</h2> <br>
                <div class="form-control">
                    <form action="" method="post">

                        <input type="email" placeholder="Email" name="email" value="<?php if (isset($_COOKIE["email"])) {
                                                                                        echo $_COOKIE["email"];
                                                                                    } ?>" required> <br>

                        <input type="password" placeholder="Password" name="password" value="<?php if (isset($_COOKIE["password"])) {
                                                                                                    echo $_COOKIE["password"];
                                                                                                } ?>"> <br>

                        <div class="remember">
                            <input type="checkbox" name="remember" <?php if (isset($_COOKIE["email"])) { ?> checked <?php } ?> required> Remember Me
                        </div>
                        <br>

                        <input type="submit" value="Login" name="Login" class="btn btn-primary btn-lg w-50"> <br>
                    </form>
                </div>
                <p>or sign up using</p>
                <!--font awesome-->
                <div class="container">
                    <div class="class">
                        <a href="https://www.facebook.com/">
                            <i class="fa-brands fa-facebook-f icons"></i>
                        </a>
                    </div>
                    <div class="class">
                        <a href="https://x.com/i/flow/login">
                            <i class="fa-brands fa-twitter icons"></i>
                        </a>
                    </div>
                    <div class="class">
                        <a href="https://mail.google.com/mail/u/0/#inbox">
                            <i class="fa-brands fa-google icons"></i>
                        </a>
                    </div>
                </div>
            </div>
            <p class="account">Don't have an account? <a href="register.php">Sign Up Here</a></p>
        </center>
    </div>
</body>

</html>