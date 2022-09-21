<?php
include 'header.php';
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
            for ($i = 1; $i < 5; $i++) { ?>
                <tr>
                    <td scope="row" class="align-middle"><?= $i; ?></td>
                    <td><img src="image/1.png" alt="" width="50%"></td>
                    <td class="align-middle">Keyboard Logitech G Pro</td>
                    <td class="align-middle">Rp. 600.000</td>
                    <td class="align-middle">Keyboard</td>
                    <td class="align-middle">
                        <button class="btn btn-warning mr-3">Edit</button><button class="btn btn-danger">Hapus</button>
                    </td>
                </tr>
            <?php
            };
            ?>
        </tbody>
    </table>
</div>

<?php
include 'footer.php';
?>