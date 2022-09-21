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

if (isset($_POST['submit'])) {


    function edit()
    {
        global $conn;
        global $id_katalog;
        global $dataKatalog;
        $namaKatalog = htmlspecialchars($_POST['namaKatalog']);

        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];


        //mengecek extensi file yg di upload
        $ekstensiYangDibolehkan = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));


        if ($namaKatalog != '') {
            if ($error == 4) {
                $query = "UPDATE `katalog` SET `nama_katalog` = '$namaKatalog' WHERE `katalog`.`id_katalog` = $id_katalog";
                mysqli_query($conn, $query);
            } else if ($error == 0) {
                unlink('image/' . $dataKatalog["nama_gambar_katalog"]);

                $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
                move_uploaded_file($tmpName, 'image/' .  $namaFileBaru);;
                $query = "UPDATE `katalog` SET `nama_katalog` = '$namaKatalog', `nama_gambar_katalog` = '$namaFileBaru'  WHERE `katalog`.`id_katalog` = $id_katalog";
                mysqli_query($conn, $query);
                // echo 'asdasd';

                if (!in_array($ekstensiGambar, $ekstensiYangDibolehkan)) {
                    echo "<script>alert('format harus jpg, jpeg dan png')</script>";
                    return false;
                }
                if ($ukuranFile > 1000000) {
                    echo "<script>alert('ukuran gambar max 1mb')</script>";
                    return false;
                }
            }

            header('Location:oprKatalog.php');
        } else if ($namaKatalog == '') {
            echo "<script>alert('isi data terlebih dahulu')</script>";
            return false;
        }
    }
    $namaFileBaru = edit();
    // print_r($_POST);
    // print_r($_FILES);
}
?>