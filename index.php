<?php
include_once('config.php');
session_start();
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $result = mysqli_query($mysqli,"SELECT * FROM barang WHERE nama_barang LIKE '%$search%'");
    $hasil_query = array();
    while ($row = mysqli_fetch_array($result)) {
        $hasil_query[] = $row;
    }
}else{
    $result = mysqli_query($mysqli, "SELECT * FROM barang");
    $hasil_query = array();
    while ($row = mysqli_fetch_array($result)) {
    $hasil_query[] = $row;
}
}
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

        <div class="row mt-5">
            <?php foreach ($hasil_query as $hasil) : ?>
               
                    <div class="col-3 ">
                        <div class="card card-size" style="width: 16rem;">
                            <img class="card-img-top" src="uploads/<?php echo $hasil['img_url'];?>" alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $hasil['nama_barang']; ?></h5>
                                <p class="price"><b><span style="color:red">Rp.<?php echo number_format($hasil['harga_barang']); ?></span></b></p>
                                <p class="card-text"><?php echo $hasil['deskripsi']; ?></p>
                            </div>
                        </div>
                        <a class="text-decoration-none stretched-link" href="viewitem.php?post=<?php echo $hasil['id_barang'] ?> "> </a>
                    </div>
               
            <?php endforeach ?>

        </div>

    </div>
   
</body>

</html>