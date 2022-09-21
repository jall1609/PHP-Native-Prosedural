<?php
include 'header.php';
$id_barang = $_GET['id_barang'];
$resultBarang = mysqli_query($conn, "SELECT * FROM barang INNER JOIN katalog ON barang.id_katalog=katalog.id_katalog WHERE id_barang=$id_barang");
$dataBarang = mysqli_fetch_assoc($resultBarang);
$resultKatalog = mysqli_query($conn, "SELECT * FROM katalog");


if (isset($_POST['submit'])) {


    function upload()
    {
        global $conn;
        global $id_barang;
        global $dataBarang;
        $namaBarang = htmlspecialchars($_POST['namaBarang']);
        $harga = $_POST['harga'];
        $id_katalog = $_POST['id_katalog'];

        $namaFile = $_FILES['nama_gambar']['name'];
        $ukuranFile = $_FILES['nama_gambar']['size'];
        $error = $_FILES['nama_gambar']['error'];
        $tmpName = $_FILES['nama_gambar']['tmp_name'];

        $ekstensiYangDibolehkan = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));


        if ($namaBarang != '' and $harga != '') {
            if ($error == 4) {
                $query = "UPDATE `barang` SET `nama_barang` = '$namaBarang', `harga` = '$harga' WHERE `barang`.`id_barang` = $id_barang";
                mysqli_query($conn, $query);
            } else if ($error == 0) {
                unlink('image/' . $dataBarang["nama_gambar"]);

                $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
                move_uploaded_file($tmpName, 'image/' .  $namaFileBaru);
                $query = "UPDATE `barang` SET `nama_barang` = '$namaBarang' , `harga` = '$harga',  `nama_gambar` = '$namaFileBaru'  WHERE `barang`.`id_barang` = $id_barang";
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

            header('Location:oprBarang.php');
        } else if ($namaBarang == '') {
            echo "<script>alert('isi data terlebih dahulu')</script>";
            return false;
        }
    }
    $namaFileBaruGambar = upload();
    // print_r($_POST);
    // print_r($_FILES);
}
?>

<div class="container mt-5">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <label for="namaBarang" class="pr-2"> Nama Barang : </label>
            <input type="text" require class="form-control ml-1" name="namaBarang" id="namaBarang" require aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?= $dataBarang['nama_barang']; ?>">
        </div>
        <div class="input-group mb-3">
            <label for="harga" class="pr-3"> Harga : </label>
            <input type="number" require class="form-control ml-5" name="harga" id="harga" require aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?= $dataBarang['harga']; ?>">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label for="harga" class="pr-1"> Katalog : </label>
            </div>
            <select class="custom-select ml-5" id="katalog" name="id_katalog">
                <?php
                foreach ($resultKatalog as $value) {
                    if ($value['id_katalog'] == $dataBarang['id_katalog']) {
                ?>
                        <option value="<?php echo $value['id_katalog']; ?>" selected><?php echo $value['nama_katalog']; ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $value['id_katalog']; ?>"><?php echo $value['nama_katalog']; ?></option>
                    <?php };
                    ?>
                <?php }
                ?>
            </select>
        </div>
        <div class="input-group mb-3">
            <label for="nama_gambar"> Gambar : </label>
            <img src="image/<?= $dataBarang['nama_gambar']; ?>" alt="" width="3%" class="ml-5">
            <div class="custom-file ml-2">
                <input type="file" require class="custom-file-input" name="nama_gambar" id="nama_gambar" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="nama_gambar"><?= $dataBarang['nama_gambar']; ?></label>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-info my-3">Tambah Katalog</button>
    </form>
</div>

<?php
include 'footer.php';
?>