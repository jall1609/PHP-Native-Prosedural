<?php
include 'header.php';
require 'koneksi.php';
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

<?php
if (isset($_POST['submit'])) {


    function upload()
    {
        global $conn;
        $namaKatalog = htmlspecialchars($_POST['namaKatalog']);

        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];
        if ($error == 4) {
            echo "<script>alert('gambar harus diisi')</script>";
            return false;
        }

        //mengecek extensi file yg di upload
        $ekstensiYangDibolehkan = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiYangDibolehkan)) {
            echo "<script>alert('format harus jpg, jpeg dan png')</script>";
            return false;
        }

        //mengecek ukuran file
        if ($ukuranFile > 1000000) {
            echo "<script>alert('ukuran gambar max 1mb')</script>";
            return false;
        }
        //merubah nama file
        $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

        //input ke database
        move_uploaded_file($tmpName, 'image/' .  $namaFileBaru);
        // return $namaFileBaru;
        if ($error == 0 and $namaKatalog != '') {
            // echo $namaFileBaru . $namaKatalog;
            $query = "INSERT INTO katalog VALUES ('', '$namaKatalog' , '$namaFileBaru')";
            mysqli_query($conn, $query);
            header('Location:oprKatalog.php');
        }
    }
    $namaFileBaru = upload();
    // print_r($_POST);
    // print_r($_FILES);
}


?>