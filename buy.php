<?php
include_once('config.php');
session_start();

$id = $_SESSION['id'];
$idbarang = $_GET['postbuy'];
$idpenjual = $_GET['idpenjual'];

$result = mysqli_query($mysqli, "INSERT INTO transaksi (id_transaksi, id_pembeli, id_penjual, tanggal, id_barang) VALUES (NULL, $id,$idpenjual,NOW(),$idbarang )");


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
    <div class="container">
        <div class="text-center mt-5">
            <h3>Transaksi Berhasil</h3>
        </div>
        <div class="text-center">
            <p><a href="index.php">Kembali</a></p>
        </div>
    </div>
</body>
</html>