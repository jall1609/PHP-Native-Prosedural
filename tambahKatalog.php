<?php
include 'header.php';
?>
<div class="container mt-5">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <label for="namaKatalog"> Nama Katalog : </label>
            <input type="text" class="form-control ml-1" name="namaKatalog" id="namaKatalog" require aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <label for="gambar"> Gambar : </label>
            <div class="custom-file ml-5">
                <input type="file" require class="custom-file-input" name="gambar" id="gambar" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="gambar">Choose file</label>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-info my-3">Tambah Katalog</button>
    </form>
</div>
<?php
include 'footer.php';
?>