<?php
include_once('config.php');
session_start();
$message = "";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE username = '$username' and password_user = '$password'" );
    $row = mysqli_fetch_array($result);

    if (is_array($row)) {
        $_SESSION["id"] = $row["id_user"];
        $_SESSION["user"] = $row["username"];
        $_SESSION["isloggedin"] = 1;
    } else {
        $message = "Invalid username or password";
    }
    if (isset($_SESSION["id"])) {
        header("Location:index.php");
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="stylesheet.css">
    <script src="js/bootstrap.js"></script>
    <link rel="icon" href="./Pictures/sadface.png">
    <title></title>
</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">
            <a class="navbar-brand" href="index.php">AC59</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container h-100 ">
        <div class="row align-items-center mt-5">
            <div class="col-6 mx-auto">
                <div class="justify-content-center">
                    <div class="login-from justify-content-center">
                        <form method="POST" action="login.php">
                            <?php if($message != ""): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php {echo $message;} ?>
                            </div>
                            <?php endif?>
                            <h3 class="">Login</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary" name="login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>