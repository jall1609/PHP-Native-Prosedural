<?php

include 'header.php';

$id_katalog = $_GET['id_katalog'];
$file = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM katalog WHERE id_katalog=$id_katalog"));
unlink('image/' . $file["nama_gambar_katalog"]);

$result = mysqli_query($conn, "DELETE FROM katalog WHERE id_katalog='$id_katalog'");
header('Location: oprKatalog.php');
