<?php 
include 'header.php';
$id_barang = $_GET['id_barang'];
$file = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM barang WHERE id_barang=$id_barang"));
unlink('img/' . $file["nama_gambar"]);

$result = mysqli_query($conn, "DELETE FROM barang WHERE id_barang='$id_barang'");
header('Location: oprBarang.php');
