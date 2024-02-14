<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['login_user'])) {
    header("Location: dashboard.php");
}

// Check Cookie
if (isset($_COOKIE['kode_petugas']) && isset($_COOKIE['key'])) {
    $kode_petugas = $_COOKIE['kode_petugas'];
    $key = $_COOKIE['key'];

    // Retrieve username
    $result = mysqli_query($conn, "SELECT username_petugas FROM petugas_perpustakaan WHERE kode_petugas = $kode_petugas");
    $row = mysqli_fetch_assoc($result);

    // Check username
    if ($key == hash('sha256', $row['username_petugas'])) {
        $_SESSION['login_user'] = true;
    }
}

if (isset($_SESSION['username_petugas'])) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['submit'])) {
    $username_petugas = $_POST['username_petugas'];
    $password_petugas_input = $_POST['password_petugas'];

    $sql = "SELECT * FROM petugas_perpustakaan WHERE username_petugas='$username_petugas'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password_petugas'];

        if (password_verify($password_petugas_input, $hashed_password)) {
            $_SESSION['login_user'] = $row['username_petugas'];
            $_SESSION['kode_petugas'] = $row['kode_petugas'];
            $_SESSION['nama_petugas'] = $row['nama_petugas'];
            $_SESSION['alamat_petugas'] = $row['alamat_petugas'];
            $_SESSION['no_hp_petugas'] = $row['no_hp_petugas'];
            $_SESSION['email_petugas'] = $row['email_petugas'];
            $_SESSION['password_petugas'] = $row['password_petugas'];

            // Check "Remember Me"
            if (isset($_POST["remember"])) {
                // Create Cookie
                setcookie('kode_petugas', $row['kode_petugas'], time() + 3600);
                setcookie('key', hash('sha256', $row['username_petugas']), time() + 3600);
            }

            header("Location: dashboard.php");
        } else {
            echo "<script>alert('Username atau password Anda salah. Silakan coba lagi!')</script>";
        }
    } else {
        echo "<script>alert('Username atau password Anda salah. Silakan coba lagi!')</script>";
    }
}

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

  <style>
    body {
      background-image: none;
    }
    
    nav {
      background-color: white;
    }

    .hero {
      margin-top: 100px;
    }

    .carousel-item img {
      margin-top: 20px;
        height: 250px;
    } 

    
    /* CSS untuk ukuran layar besar */
    @media only screen and (min-width: 1100px) {

    body {
      background-image: url(img/bg2.svg);
      height: 85vh;
      background-repeat: no-repeat;
      background-position: bottom;
    }

      .carousel-item img {
        height: 520px;
      } 
    }

  </style>

  <title>E Perpus</title>
</head>

<body>

  <!-- Navbar start -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="petugas.php">E Perpus</a>
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
                  href="https://wa.me/0895613982082?text=Hallo,%20Saya%20ingin%20bertanya%20sesuatu"
                  target="blank">Whatsapp</a>
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
          <h1 class="display-5 fw-bolder">
            Selamat Datang di Perpustakaan Digital SMK Negeri 0 Tasikmalaya
          </h1>
          <p class="lead fw-normal">Budayakan membaca, demi masa depan yang lebih mudah.</p>
          <hr class="mt-4 mb-4" />
          <div class="row">
            <p class="desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Corporis quas, culpa veritatis rerum dolores quia adipisci nam
              amet! Quidem eaque repellendus magnam officiis totam iste
              deserunt harum voluptatum temporibus velit.
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
          <!-- Login Card start -->
          <div class="col">
              <div class="card card-form ms-3 me-3 pb-4 shadow-sm p-3 mb-5 bg-body rounded">
                  <h4 class="text-center mt-3">Masuk</h4>
                  <div class="container">
                      <!-- Carousel start -->
                      <div id="carousel" class="carousel slide carousel-fade d-none d-md-block " data-bs-ride="carousel">
                          <div class="carousel-inner">
                              <div class="carousel-item active " data-bs-interval="2500">
                                  <img src="img/img1.svg" class="d-block img-fluid  ms-auto me-auto" style="height: 200px" alt="..." />
                              </div>
                              <div class="carousel-item" data-bs-interval="2500">
                                  <img src="img/img2.svg" class="d-block  img-fluid  ms-auto me-auto" style="height: 200px" alt="..." />
                              </div>
                          </div>
                      </div>
                      <!-- Carousel end -->


                      <form action="" method="POST" class="login-username">
                          <div class="mb-3 mt-3">
                              <div class="row">
                                  <div class="col-md-4">
                                      <label for="username_petugas" class="form-label">Username</label>
                                  </div>
                                  <div class="col">
                                      <input class="form-control" type="username" placeholder="username_petugas" name="username_petugas" value="<?php echo $username_petugas; ?>" required>
                                  </div>
                              </div>

                          </div>
                          <div class="mb-3">
                              <div class="row">
                                  <div class="col-md-4">
                                      <label for="password_petugas" class="form-label">Password</label>
                                  </div>
                                  <div class="col">
                                      <input class="form-control" type="password" placeholder="password_petugas" name="password_petugas" value="<?php echo $_POST['password_petugas']; ?>" required>
                                  </div>
                              </div>
                          </div>
                          <div class="mb-3">
                              <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Remember me</label>
                          </div>
                          <div class="mb-3 text-end">
                              <button name="submit" class="btn btn-outline-success ps-5 pe-5">Login</button>
                          </div>
                          <p class=" login-register-text text-end">Anda belum punya akun? <a href="register.php" style="text-decoration: none; color: #1e9f4369;">Register</a></p>
                      </form>
                  </div>
              </div>
          </div>
          <!-- Login Card end -->
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