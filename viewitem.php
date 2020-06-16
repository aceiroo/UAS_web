<?php
include_once('config.php');
session_start();

$idbarang = $_GET['post'];
$result = mysqli_query($mysqli, "SELECT * FROM barang INNER JOIN users on barang.id_user = users.id_user WHERE id_barang = $idbarang ");
$hasil_query = mysqli_fetch_array($result);
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
                <form action="index.php" method="get" class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav d-flex">
                        <input class="form-control mr-sm-2 col-sm-12" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-color" type="submit">Search</button>
                    </ul>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
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
        <div class="row mt-5">
            <div class="col-sm-3">
                <div class="image">
                    <img src="uploads/<?php echo $hasil_query['img_url'] ?>" alt="shithappens">
                </div>
            </div>
            <div class="col-sm">
                <h4 class="mt-5"><?php echo $hasil_query['nama_barang'] ?></h4>
                <p>post by <?=$hasil_query['username']?></p>
                <hr>
                <h3 class="price"><span style="color:red">Rp<?php echo number_format($hasil_query['harga_barang']); ?></span></h3>
                
            </div>
        </div>
        <div class="row mt-4 overflow-hidden">
            <div class="col">
                <hr>
                <h5 class="pl-3">Deskripsi Produk</h5>
                <hr>
                <p class="mt-4"><?php echo $hasil_query['deskripsi']; ?></p>
            </div>
        </div><hr>
        <?php if (isset($_SESSION["isloggedin"])) : ?>
        <div class="d-flex flex-row">
            <?php if($_SESSION['id'] == $hasil_query['id_user']) : ?>
            <a class="btn btn-primary mt-3 mr-2" href="edit.php?postedit=<?php echo $hasil_query['id_barang'] ?>">Edit</a>
            <a class="btn btn-primary mt-3 mr-2" href="delete.php?postdelete=<?php echo $hasil_query['id_barang'] ?>">Delete</a>
            <?php endif ?>
        </div>

        <div class="d-flex flex-row-reverse">
            <a class="btn btn-success mr-2" href="buy.php?postbuy=<?php echo $hasil_query['id_barang'] ?>&idpenjual=<?= $hasil_query['id_user']?>">Buy</a>
        </div>
        <?php else : ?>
            <div class="d-flex flex-row-reverse">
            <p><span style="color:red">Silahkan login terlebih dahulu</span></p>
        </div>
        <?php endif?>
        <div>
</body>

</html>