<?php
include 'header.php';
$resultKatalog = mysqli_query($conn, "SELECT * FROM katalog");
if (isset($_POST['submit'])) {



    function upload()
    {
        global $conn;
        $namaBarang = htmlspecialchars($_POST['namaBarang']);
        $harga = $_POST['harga'];
        $id_katalog = $_POST['id_katalog'];

        $namaFile = $_FILES['nama_gambar']['name'];
        $ukuranFile = $_FILES['nama_gambar']['size'];
        $error = $_FILES['nama_gambar']['error'];
        $tmpName = $_FILES['nama_gambar']['tmp_name'];
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
        $namaFileBaruGambar = uniqid() . '.' . $ekstensiGambar;

        //input ke database
        move_uploaded_file($tmpName, 'image/' .  $namaFileBaruGambar);
        // return $namaFileBaruGambar;
        if ($error == 0 and $namaBarang != '' and $harga != '') {
            // echo $namaFileBaruGambar . $namaKatalog;
            $query = "INSERT INTO barang VALUES ('', '$namaBarang' ,'$harga', '$namaFileBaruGambar', '$id_katalog')";
            mysqli_query($conn, $query);
        }
        header('Location:oprBarang.php');
    }
    $namaFileBaruGambar = upload();
    // print_r($_POST);
    // print_r($_FILES);
};
?>

<div class="container mt-5">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <label for="namaBarang" class="pr-2"> Nama Barang : </label>
            <input type="text" require class="form-control ml-1" name="namaBarang" id="namaBarang" require aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <label for="harga" class="pr-3"> Harga : </label>
            <input type="number" require class="form-control ml-5" name="harga" id="harga" require aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label for="harga" class="pr-1"> Katalog : </label>
            </div>
            <select class="custom-select ml-5" id="katalog" name="id_katalog">
                <option disabled selected>Pilih katalog</option>
                <?php
                foreach ($resultKatalog as $value) { ?>
                    <option value="<?php echo $value['id_katalog']; ?>"><?php echo $value['nama_katalog']; ?></option>
                <?php }
                ?>
            </select>
        </div>
        <div class="input-group mb-3">
            <label for="nama_gambar"> Gambar : </label>
            <div class="custom-file ml-5">
                <input type="file" require class="custom-file-input" name="nama_gambar" id="nama_gambar" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="nama_gambar">Choose file</label>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-info my-3">Tambah Katalog</button>
    </form>
</div>

<?php
include 'footer.php';

?>