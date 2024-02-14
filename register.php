<?php

include 'config.php';
session_start();
error_reporting(0);

if (isset($_SESSION['login_user'])) {
    header("Location: dashboard.php");
}

if (isset($_POST['submit'])) {
    $username_petugas = $_POST['username_petugas'];
    $nama_petugas = $_POST['nama_petugas'];
    $alamat_petugas = $_POST['alamat_petugas'];
    $no_hp_petugas = $_POST['no_hp_petugas'];
    $email_petugas = $_POST['email_petugas'];
    $password_petugas = password_hash($_POST['password_petugas'], PASSWORD_DEFAULT);

    $sql = "SELECT * FROM petugas_perpustakaan WHERE username_petugas=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username_petugas);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo "<script type='text/javascript'>alert('Username telah terdaftar.');</script>";
    } else {
        $sql = "INSERT INTO petugas_perpustakaan (nama_petugas, alamat_petugas, no_hp_petugas, email_petugas, username_petugas, password_petugas)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssss", $nama_petugas, $alamat_petugas, $no_hp_petugas, $email_petugas, $username_petugas, $password_petugas);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script type='text/javascript'>alert('Selamat! Akun Anda berhasil didaftarkan. Silakan melakukan Login!');window.location='login.php'</script>";
            $username_petugas = "";
            $nama_petugas = "";
            $alamat_petugas = "";
            $no_hp_petugas = "";
            $email_petugas = "";
            $_POST['password_petugas'] = "";
        } else {
            echo "<script type='text/javascript'>alert('Terjadi kesalahan. Registrasi gagal!');</script>";
        }
        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown me-5">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Contact
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="mailto:12.zeinirfansyah@gmail.com" target="blank">Email</a>
              </li>
              <li>
                <a class="dropdown-item" href="https://wa.me/0895613982082?text=Hallo,%20Saya%20ingin%20bertanya%20sesuatu" target="blank">Whatsapp</a>
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
          <!-- Register Card start -->
          <div class="col">
            <div class="card card-form  ms-3 me-3 pb-4 shadow-sm p-2 mb-5 bg-body rounded">
              <h4 class="text-center mt-3">Registrasi Akun</h4>
              <div class="container">
                <form action="" method="POST" class="login-username">
                  <!-- nama petugas -->
                  <div class="mb-3 mt-3">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="nama_petugas" class="form-label">Nama Lengkap</label>
                      </div>
                      <div class="col">
                        <input class="form-control" type="text" placeholder="Nama Lengkap" name="nama_petugas" value="<?php echo $nama_petugas; ?>" required>
                      </div>
                    </div>
                  </div>

                  <!-- alamat petugas -->
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="alamat_petugas" class="form-label">Alamat</label>
                      </div>
                      <div class="col">
                        <input class="form-control" type="text" placeholder="Alamat Lengkap" name="alamat_petugas" value="<?php echo $alamat_petugas; ?>" required>
                      </div>
                    </div>
                  </div>

                  <!-- no_hp_petugas -->
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="no_hp_petugas" class="form-label">Nomor Telepon</label>
                      </div>
                      <div class="col">
                        <input class="form-control" type="number" placeholder="Nomor Telepon" name="no_hp_petugas" value="<?php echo $no_hp_petugas; ?>" required>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3 mt-3">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="username_petugas" class="form-label">Username</label>
                      </div>
                      <div class="col">
                        <input class="form-control" type="username" placeholder="Username" name="username_petugas" value="<?php echo $username_petugas; ?>" required>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3 mt-3">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="email_petugas" class="form-label">Email</label>
                      </div>
                      <div class="col">
                        <input class="form-control" type="email" placeholder="Email" name="email_petugas" value="<?php echo $email_petugas; ?>" required>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="password_petugas" class="form-label">Password</label>
                      </div>
                      <div class="col">
                        <input class="form-control" type="password" placeholder="Password" name="password_petugas" value="<?php echo $_POST['password_petugas']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 text-end">
                    <button name="submit" class="btn btn-outline-success ps-5 pe-5">Register</button>
                  </div>
                  <p class=" login-register-text text-end">Anda sudah punya akun? <a href="login.php" style="text-decoration: none; color: #1e9f4369;">Login</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- Register Card end -->
        </div>
      </div>
    </div>
  </section>
  <!-- hero end -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

<!-- TRIBUTE GAMBAR 

<a href="https://storyset.com/health">Health illustrations by Storyset</a>

-->