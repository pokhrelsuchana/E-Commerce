<?php
include('../includes/db_conn.php');

if (isset($_POST['Login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM userdata WHERE email='$email' AND Password='$password'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($result);
    if ($row) {
        if (!empty($_POST["Remember_Me"])) {
            setcookie("email", $email, time() + 60 * 60 * 24 * 30);
            setcookie("password", $password, time() + 60 * 60 * 24 * 30);
        } else {
            setcookie("email", "", time() - 1);
            setcookie("password", "", time() - 1);
        }

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<script type='text/javascript'>
        alert('Login Successful.');
        window.location.href='../index.php';
        </script>";
        } else {
            echo "<script type='text/javascript'>
        alert('Login Failed');
        </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../includes/styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<style>
    .full-container {
        display: flex;
        align-items: center;
        height: 100vh;
    }

    .image-side {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .image-side img {
        max-width: 100%;
        height: auto;
    }

    .login-side {
        flex: 1;
        padding: 30px;
        margin-top: 70px;
        display: flex;
        flex-direction: column;
    }

    h2 {
        font-size: 30px;
    }

    p {
        font-size: 20px;
    }

    .containers {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .class a {
        background-color: #2c0042;
        color: white;
        font-size: 30px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
    }

    .icons {
        font-size: 24px;
    }

    input[type="submit"] {
        width: 120px;
        height: 45px;
        border: 1px solid #ccc;
        background-color: #380651;
        color: white;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #545151;
        color: #ccc;
    }

    input[type="submit"]:after {
        background-color: #380651;
        color: white;
    }

    input[type="email"] {
        width: 300px;
        height: 45px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        padding: 10px;
        outline: none;
    }

    input[type="password"] {
        width: 300px;
        height: 45px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        padding: 10px;
        outline: none;
    }

    .account {
        font-size: 14px;
    }

    .remember {
        font-size: 16px;
        color: rgb(118, 111, 111);
    }
</style>

<body>
    <div class="full-container">
        <div class="image-side">
            <img src="../Image/image.png" alt="this is an image">
        </div>

        <div class="login-side">
            <center>
                <h2>Sign in with
                    <div class="containers">
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
                </h2>
                <p>or</p>

                <div class="form-control">
                    <form action="" method="post">

                        <input type="email" placeholder="Email Address" name="email" value="<?php if (isset($_COOKIE["email"])) {
                                                                                                echo $_COOKIE["email"];
                                                                                            } ?>" required> <br> <br>

                        <input type="password" placeholder="Password" class="password" name="password" value="<?php if (isset($_COOKIE["password"])) {
                                                                                                                    echo $_COOKIE["password"];
                                                                                                                } ?>" required> <br> <br>

                        <div class="remember">
                            <input type="checkbox" name="Remember_Me" <?php if (isset($_COOKIE["email"])) { ?> checked <?php } ?> required>Remember Me
                        </div>
                        <br>
                        <input type="submit" value="Login" name="Login"> <br>

                        <p class="account">Don't have an account? <a href="register.php">Register</a></p>
                    </form>
                </div>
        </div>
    </div>
    </center>
</body>

</html>