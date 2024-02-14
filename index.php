<?php

session_start();

require 'config.php';

$sql = mysqli_query($conn, "SELECT * FROM buku");


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- My CSS -->

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <!-- custom CSS -->
  <style>
    
    body {
      background-color: #fff;
    }

    .hero {
      margin-top: 5rem;
    }

  </style>

  <title>Sistem Informasi Perpustakaan</title>
</head>

<body>
  <!-- Navbar start -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Sistem Informasi Perpustakaan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown me-5">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Contact
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="mailto:12.zeinirfansyah@gmail.com" target="blank">Email</a>
              </li>
              <li>
                <a class="dropdown-item"
                  href="https://www.instagram.com/zeinirfansyah"
                  target="blank">Instagram</a>
              </li>
            </ul>
          </li>
          <li><a class="nav-link" href="petugas.php">Petugas</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar end -->

  <!-- hero start -->
  <section id="home" class="hero">
    <div class="container">
      <div class="row text-center">
        <div class="col mx-auto my-auto">
          <h1 class="title-home fw-bolder">
            Selamat Datang di Perpustakaan Digital SMK Negeri 0 Tasikmalaya
          </h1>
          <p class="desc">Budayakan membaca, demi masa depan yang lebih mudah.</p>
          <hr class="mt-4 mb-2" />
        </div>
      </div>
    </div>
  </section>
  <!-- hero end -->
  <!-- Book section start -->
  <section id="bookhome" class="bookhome">
        <div class="container">
            <!-- Banner start -->
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="row">
                            <div class="col">
                                <!-- booklists start -->
                                <p class="desc2 m-3 text-center text-lg-start">Berikut adalah katalog buku yang tersedia di Perpustakaan SMK Negeri 0 Tasikmalaya</p>
                                <iframe class="mb-5" src="page/buku/view_buku_siswa.php" name="frame" frameborder="0" height="360px" width="100%"></iframe>
                                <!-- --- -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner end -->

            
        </div>
    </section>
    <!-- Book section end -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>
