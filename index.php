<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <h3>Katalog Aksesoris PC</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
            </ul>
            <span class="navbar-text">
                <ul class="navbar-nav mr-auto font-weight-bold">
                    <li class="nav-item mx-3">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item mx-3 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Operasi
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-dark" href="oprKatalog.php">Data Katalog</a>
                            <a class="dropdown-item text-dark" href="oprBarang.php">Data Barang</a>
                        </div>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="Katalog.php">Catalog</a>
                    </li>
                </ul>
            </span>
        </div>
    </nav>
</header>

<body>
    <div id="main">

        <div id="jumbotron" class="d-flex justify-content-center">
            <img src="image/1.jpg" alt="">
            <div class="fade-item position-absolute"></div>
            <div id="judul-jumbotron" class="position-absolute">
                <h2 class="text-center text-light font-weight-bold">
                    Welcome
                </h2>
            </div>
        </div>

        <div id="daftar-katalog">
            <h3>Daftar Katalog</h3>
            <hr>
            <div class="row">
                <?php
                for ($i = 0; $i < 6; $i++) {
                ?>
                    <div class="col d-flex justify-content-center col-md-2 ">
                        <div class="card bg-info " style="width: 8rem;">
                            <a href="#" class="katalog">
                                <img class="cardKatalog rounded-circle" src="image/2.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="text-center  text-light">Keyboard</p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php }; ?>
            </div>
        </div>

        <div id="daftar-barang">
            <h3>Daftar Barang</h3>
            <hr>
            <div class="row ">
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <div class="col d-flex justify-content-center col-md-3 my-3 ">
                        <div class="card border-info" style="width: 15rem; height: 420px;">
                            <a href="#">
                                <img class="card-img-top" src="image/1.png" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title text-justify f-15 text-dark">Keyboard Gaming RGB Logitech G213 Prodigy </h5>
                                    <p class="card-text f-11">Rp. 300.000,-</p>
                                    <a href="#" class="btn btn-info mt-1">Beli</a>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php }; ?>
            </div>
        </div>


    </div>


    <div id="kumpulanScript">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </div>
</body>

</html>