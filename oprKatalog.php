<?php
include 'header.php';
require 'koneksi.php';
$resultKatalog = mysqli_query($conn, "SELECT * FROM katalog");
?>
<h2>Operasi Katalog</h2>
<hr>
<button type="button" class="btn btn-info my-3" onclick="document.location='tambahKatalog.php'">Tambah Katalog</button>
<table class="table">
    <thead class="thead bg-info text-center text-white">
        <tr>
            <th scope="col">No.</th>
            <th scope="col" width=" 40%">Gambar</th>
            <th scope="col">Nama Katalog</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($resultKatalog as $katalog) { ?>
            <tr>
                <td class="align-middle text-center"><?= $i; ?></td>
                <td class="">
                    <div class="d-flex justify-content-center"><img src="image/<?php echo $katalog['nama_gambar_katalog']; ?>" alt="" width="30%"></div>
                </td>
                <td class="align-middle  text-center">
                    <?php echo $katalog['nama_katalog']; ?>
                </td>
                <td class="align-middle ">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-warning mr-3" onclick="document.location='editKatalog.php?id_katalog=<?= $katalog['id_katalog']; ?>'" class="btn btn-warning mr-3">Edit</button>
                        <button class="btn btn-danger" onclick="document.location='hapusKatalog.php?id_katalog=<?= $katalog['id_katalog']; ?>'">Hapus</button>
                    </div>
                </td>
            </tr>
        <?php
            $i++;
        };
        ?>
    </tbody>
</table>
<?php
include 'footer.php';
?>