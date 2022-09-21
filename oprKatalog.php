<?php
include 'header.php';
?>
<h2>Operasi Katalog</h2>
<hr>
<button type="button" class="btn btn-info my-3">Tambah Katalog</button>
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
        for ($i = 0; $i < 4; $i++) { ?>
            <tr>
                <td class="align-middle text-center"><?= $i + 1; ?></td>
                <td class="">
                    <div class="d-flex justify-content-center"><img src="image/2.jpg" alt="" width="30%"></div>
                </td>
                <td class="align-middle  text-center">
                    Keyboard
                </td>
                <td class="align-middle ">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-warning mr-3">Edit</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </td>
            </tr>
        <?php
        };
        ?>
    </tbody>
</table>
<?php
include 'footer.php';
?>