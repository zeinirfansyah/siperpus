<?php 
	include '../../config.php';


    // read data buku
    $view_buku_query = mysqli_query($conn, "SELECT * FROM buku ORDER BY kode_buku DESC");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Hello, world!</title>
  </head>
  <body>

  <!-- tabel buku -->
    <div class="container">
    <table class="table table-buku-siswa table-bordered  table-hover">
        <thead>
            <tr class="th_sticky">
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Pengarang</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Tahun</th>
                <th scope="col">ISBN</th>
                <th scope="col">Stok Tersedia</th>
                <th scope="col">Lokasi Buku</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;
                while($view_tabel_buku = mysqli_fetch_array($view_buku_query)){
            ?>
            <tr>
                <th scope="row"><?php echo $no++; ?></th>
                <td><?php echo $view_tabel_buku['judul_buku']; ?></td>
                <td><?php echo $view_tabel_buku['pengarang_buku']; ?></td>
                <td><?php echo $view_tabel_buku['penerbit_buku']; ?></td>
                <td><?php echo $view_tabel_buku['tahun_terbit']; ?></td>
                <td><?php echo $view_tabel_buku['isbn']; ?></td>
                <td><?php echo $view_tabel_buku['stok_tersedia']; ?></td>
                <td><?php echo $view_tabel_buku['lokasi_buku']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
