<?php
include_once('config.php');
session_start();

if (isset($_POST['create-item'])) {
    $itemname = $_POST['item-name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $id = $_SESSION['id'];

    $file = $_FILES['upload'];

    $fileName = $_FILES['upload']['name'];
    $fileTmpName = $_FILES['upload']['tmp_name'];
    $fileSize = $_FILES['upload']['size'];
    $fileError = $_FILES['upload']['error'];
    $fileType = $_FILES['upload']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 300000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: index.php?uploadsuccess");
            } else {
                echo "You can't upload more than 3MB!";
            }
        } else {
            echo "There was an error!";
        }
    } else {
        echo "Can't upload file of this type!";
    }
    $result = mysqli_query($mysqli, "INSERT INTO barang(id_barang,nama_barang,harga_barang,deskripsi,id_user,img_url) VALUES(null,'$itemname','$price','$description','$id','$fileNameNew') ");
};

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&display=swap" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <link rel="icon" href="./Pictures/sadface.png">
    <title>AC59</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <?php if (isset($_SESSION["isloggedin"])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="createitem.php">Create Item</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"><?php echo $_SESSION["user"]; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>

    <!--Grid column-->
    <div class="container">

        <div class="container h-100 ">
            <div class="row align-items-center mt-5">
                <div class="col-6 mx-auto">
                    <div class="justify-content-center">
                        <div class="login-from justify-content-center">
                            </form>
                            <form method="post" action="createitem.php" enctype="multipart/form-data">
                                <h3 class="">Create Item</h3>
                                <div class="form-group">
                                    <label for="upload">Upload</label>
                                    <input type="file" class="form-control" name="upload">
                                </div>
                                <div class="form-group">
                                    <label for="namabarang">Item Name</label>
                                    <input type="text" class="form-control" name="item-name">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" name="price">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" name="create-item">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>