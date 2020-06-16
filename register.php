<?php
include_once('config.php');

if (isset($_POST['register'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $result = mysqli_query($mysqli, "INSERT INTO users(id_user,username,email_user,password_user) VALUES(null,'$username','$email','$password')");

    header("Location: index.php");
};

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
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Register</a>
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
                        <form method="post" action="register.php">
                            <h3 class="">Register</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <button type="submit" class="btn btn-primary" name="register">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>