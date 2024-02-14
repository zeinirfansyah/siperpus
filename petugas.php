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
      background-color: #f5f5f5;
    }

    .hero {
      margin-top: 7rem;
      margin-bottom: 7rem;
    }

    .carousel-item img {
      height: 30rem;
    }

  </style>

  <title>Sistem Informasi Perpustakaan</title>
</head>

<body>
  <!-- Navbar start -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="petugas.php">Sistem Informasi Perpustakaan</a>
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

          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar end -->

  <!-- hero start -->
  <section id="home" class="hero">
    <div class="container">
      <div class="row text-center text-lg-start">
        <div class="col-md-6 mx-auto my-auto">
          <h2 class="display-5 fw-bolder">
            Selamat Datang di Perpustakaan Digital SMK Negeri 0 Tasikmalaya
          </h2>
          <p class="lead fw-normal">Budayakan membaca, demi masa depan yang lebih mudah.</p>
          <hr class="mt-4 mb-4" />
          <div class="row">
            <p class="desc">
            Proyek ini merupakan proyek dummy yang dibuat oleh Zein Irfansyah untuk tujuan pembelajaran dan demonstrasi portfolio. Konten, data, dan fitur dalam proyek ini bersifat fiktif dan tidak mewakili entitas atau organisasi nyata. Zein Irfansyah tidak bertanggung jawab atas penggunaan atau konsekuensi dari proyek ini di luar konteks pembelajaran. Setiap kemiripan dengan entitas atau organisasi yang sebenarnya adalah kebetulan belaka.
            </p>
          </div>
          <div class="row">
            <div class="col">
              <a href="login.php">
                <button name="login" class="btn btn-success ps-5 pe-5">
                  Masuk
                </button>
              </a>
              <a href="register.php">
                <button name="register" class="btn btn-success ps-5 pe-5">
                  Daftar
                </button>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 mx-auto">
          <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/gbr1.svg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="img/gbr2.svg" class="d-block w-100" alt="..." />
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- hero end -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>

<!-- TRIBUTE GAMBAR 

<a href="https://storyset.com/health">Health illustrations by Storyset</a>

-->