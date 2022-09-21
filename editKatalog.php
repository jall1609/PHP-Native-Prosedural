<?php
include 'header.php';
$id_katalog = $_GET['id_katalog'];
$resultKatalog = mysqli_query($conn, "SELECT * FROM katalog WHERE id_katalog=$id_katalog");
$dataKatalog = mysqli_fetch_assoc($resultKatalog);
?>
<div class="container mt-5">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <label for="namaKatalog"> Nama Katalog : </label>
            <input type="text" class="form-control ml-1" name="namaKatalog" id="namaKatalog" require aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?= $dataKatalog['nama_katalog']; ?>">
        </div>
        <div class="input-group mb-3">
            <label for="gambar"> Gambar : </label>
            <img src="image/<?= $dataKatalog['nama_gambar_katalog']; ?>" alt="" width="3%" class="ml-5">
            <div class="custom-file ml-2">
                <input type="file" require class="custom-file-input" name="gambar" id="gambar" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="gambar"><?= $dataKatalog['nama_gambar_katalog']; ?></label>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-info my-3">Tambah Katalog</button>
    </form>
</div>
<?php
include 'footer.php';
?>