<?php
include_once('config.php');
session_start();

$idbarang = $_GET['postdelete'];
    $result = mysqli_query($mysqli, "DELETE from barang where id_barang = $idbarang");
    header("Location: index.php");
?>
