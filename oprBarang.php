<?php
include 'header.php';
$resultBarang = mysqli_query($conn, "SELECT * FROM barang INNER JOIN katalog ON barang.id_katalog=katalog.id_katalog");
?>

<div class="container mt-5">
    <h2>Operasi Barang</h2>
    <hr>
    <button type="button" class="btn btn-info my-3" onclick="document.location='tambahBarang.php'">Tambah Barang</button>
    <table class="table text-center">
        <thead class="thead bg-info text-white">
            <tr>
                <th scope="col">No.</th>
                <th scope="col" width=" 20%">Gambar</th>
                <th scope="col" width=" 20%">Nama Barang</th>
                <th scope="col" width=" 20%">Harga</th>
                <th scope="col" width=" 20%">Nama Katalog</th>
                <th scope="col" width=" 20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($resultBarang as $value) { ?>
                <tr>
                    <td scope="row" class="align-middle"><?= $i; ?></td>
                    <td><img src="image/<?php echo $value['nama_gambar']; ?>" alt="" width="50%"></td>
                    <td class="align-middle"><?php echo $value['nama_barang']; ?></td>
                    <td class="align-middle">Rp. <?= number_format($value['harga'], '0', '.   ', '.'); ?></td>
                    <td class="align-middle"><?= $value['nama_katalog']; ?></td>
                    <td class="align-middle">
                        <button onclick="document.location='editBarang.php?id_barang=<?= $value['id_barang']; ?>'" class="btn btn-warning mr-3">Edit</button><button onclick="document.location='hapusBarang.php?id_barang=<?= $value['id_barang']; ?>'" class="btn btn-danger">Hapus</button>
                    </td>
                </tr>
            <?php
                $i++;
            };
            ?>
        </tbody>
    </table>
</div>

<?php
include 'footer.php';
?>