<?php
include 'header.php';
$resultKatalog = mysqli_query($conn, 'SELECT * FROM katalog');
?>

<div class="container py-3">
    <?php
    if (isset($_GET['query'])) :
        $query = $_GET['query'];
        $resultBarang = mysqli_query($conn, "SELECT * FROM barang INNER JOIN katalog ON barang.id_katalog = katalog.id_katalog WHERE katalog.nama_katalog='" . $query . "'");
    ?>
        <h3>Daftar Barang dengan Katalog <?= $query ?></h3>
        <hr>
        <div class="row ">
            <?php foreach ($resultBarang as $barang) { ?>
                <div class="col d-flex justify-content-center col-md-3 my-3 ">
                    <div class="card border-info" style="width: 15rem; height: 420px;">
                        <a href="#">
                            <img class="card-img-top" src="image/<?= $barang['nama_gambar']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 style="height: 50px;" class="card-title text-justify f-15 text-dark"><?= $barang['nama_barang']; ?> </h5>
                                <p class="card-text f-11">Rp. <?= number_format($barang['harga'], '0', '.   ', '.'); ?>,-</p>
                                <a href="#" class="btn btn-info mt-3">Beli</a>
                            </div>
                        </a>
                    </div>
                </div>
            <?php }; ?>
        </div>
    <?php
    else :
    ?>
        <h3>Daftar Katalog</h3>
        <hr>
        <div class="row">
            <?php
            $i = 1;
            foreach ($resultKatalog as $rsl) { ?>
                <div class="col col-md-2 my-2">
                    <div class="card bg-info " style="width: 8rem;">
                        <a href="Katalog.php?query=<?= $rsl['nama_katalog']; ?>" class="katalog">
                            <img class="cardKatalog rounded-circle" src="image/<?= $rsl['nama_gambar_katalog']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-textKatalog text-light"><?= $rsl['nama_katalog']; ?></p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php
            }; ?>
        </div>
    <?php
    endif;
    include 'footer.php';
    ?>
</div>