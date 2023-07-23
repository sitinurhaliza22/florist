<?php 

session_start();

if (!isset($_SESSION['admin'])) {
   echo "<script>
         window.location.replace('../login.php');
       </script>";
  exit;
}
require 'functions.php';


if (isset($_POST["register"])) {
  
  if (tambah($_POST) > 0 ) {
     echo "<script>
        alert('Produk Berhasil Ditambahkan!');
        window.location.href='index.php';
      </script>";
  } else {
    echo mysqli_error($conn);
  }

} 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Ailee's Florist</title>
    <style>
        .btn {
            text-decoration: none;
            padding: 3px 10px;
            background-color: darkred;
        }
        #content {
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <?php include '../jumbotron.php'; ?>
    </header>

   <main>
        <div id="content">
            <h2 class="judul">Tambah Produk</h2>
            <center><a href="index.php">Kembali</a></center>
            <article class="card">
                <form action="" method="post" enctype="multipart/form-data">
                    <?php $username = $_SESSION['username']; ?>
                    <input type="hidden" id="username_seller" name="username_seller" value="<?= $username; ?>">
                    <div class="jarak">
                         <label for="gambar">Gambar Produk</label>
                         <input type="file" id="gambar" name="gambar" required>
                    </div>
                    <div class="jarak">
                         <label for="nama">Nama Produk</label>
                         <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Produk" required>
                    </div>
                    <div class="jarak">
                         <label for="kode">Kode Produk</label>
                         <input type="text" id="kode" name="kode" placeholder="Masukkan Kode Produk" required>
                    </div>
                    <div class="jarak">
                         <label for="tgl_produksi">Tanggal Produksi</label>
                         <input type="date" id="tgl_produksi" name="tgl_produksi" required>
                    </div>
                    <div class="jarak">
                         <label for="deskripsi">Deskripsi Produk</label>
                         <textarea id="deskripsi" name="deskripsi" required></textarea>
                    </div>
                    <div class="jarak">
                         <label for="harga">Harga Produk</label>
                         <input type="number" id="harga" name="harga" placeholder="Masukkan Harga Produk" required>
                    </div>
                    <div class="jarak">
                         <label for="stok">Stock Produk</label>
                         <input type="number" id="stok" name="stok" placeholder="Masukkan Stock Produk" required>
                    </div>
                    <div class="jarak">
                         <label for="status">Status</label>
                         <input type="radio" id="status" name="status" value="Siap Kirim" required>Siap Kirim
                         <input type="radio" id="status" name="status" value="Pre-Order" required>Pre-Order
                    </div>
                    <button type="submit" name="register" class="btn" style="width: 100%;padding:10px;background-color: royalblue;">Tambah</button>
                </form>
            </article>
        </div>
    </main>


    <?php include '../footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>