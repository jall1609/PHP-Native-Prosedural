<?php
include 'header.php';
$resultBarang = mysqli_query($conn, "SELECT * FROM barang");
$resultKatalog = mysqli_query($conn, "SELECT * FROM katalog LIMIT 6");
?>
<div id="jumbotron" class="d-flex justify-content-center">
    <img src="image/1.jpg" alt="">
    <div class="fade-item position-absolute"></div>
    <div id="judul-jumbotron" class="position-absolute">
        <h2 class="text-center text-light font-weight-bold">
            Welcome
        </h2>
    </div>
</div>

<div id="daftar-katalog" class="mt-3">
    <h3>Daftar Katalog</h3>
    <hr>
    <div class="row ">
        <?php
        foreach ($resultKatalog as $katalog) {
        ?>
            <div class="col d-flex justify-content-center col-md-2 ">
                <div class="card bg-info " style="width: 8rem;">
                    <a href="Katalog.php?x=<?= $katalog['nama_katalog']; ?>" class="katalog">
                        <img class="cardKatalog rounded-circle" src="image/<?= $katalog['nama_gambar_katalog']; ?>" alt="Card image cap">
                        <div class="card-body">
                            <p class="text-center  text-light"><?= $katalog['nama_katalog']; ?></p>
                        </div>
                    </a>
                </div>
            </div>
        <?php }; ?>
    </div>
</div>

<div id="daftar-barang" class="my-5">
    <h3>Daftar Barang</h3>
    <hr>
    <div class="row ">
        <?php foreach ($resultBarang as $barang) { ?>
            <div class="col d-flex justify-content-center col-md-3 my-3 ">
                <div class="card border-info" style="width: 15rem; height: 420px;">
                    <a href="#">
                        <img class="card-img-top" src="image/<?= $barang['nama_gambar']; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-justify f-15 text-dark"><?= $barang['nama_barang']; ?> </h5>
                            <p class="card-text f-11">Rp. <?= number_format($barang['harga'], '0', '.   ', '.'); ?>,-</p>
                            <a href="#" class="btn btn-info mt-1">Beli</a>
                        </div>
                    </a>
                </div>
            </div>
        <?php }; ?>
    </div>
</div>
<?php
include 'footer.php';
?>