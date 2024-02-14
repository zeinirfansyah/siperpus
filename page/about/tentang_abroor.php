<?php

$halaman = @$_GET['p'];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/style.css">
    <title>About</title>
  </head>
  <body>
    <div class="navigation sticky-top">
        <div class="row">
            <div class="col">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="?p=about">About Negeri 0 Tasikmalaya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?p=visimisi">Visi & Misi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?p=galeri">Gallery</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
    
    <div class="row">
        <div class="col">
            <div class="content">
                <main>
                    <div class="container">
                        <?php 

                        if($halaman == 'galeri') {
                            require_once 'page/about/galeri.php';
                        } else if($halaman == 'visimisi') {
                            require_once 'page/about/visimisi.php';
                        } else if ($halaman = 'about') {
                            require_once 'page/about/about.php';
                        } else { 
                            require_once 'page/about/about.php';
                        }
                        ?>        
                    </div>
                </main>
            </div>
        </div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
