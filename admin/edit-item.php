<?php
session_start();

if (!isset($_SESSION['admin'])) {
   echo "<script>
         window.location.replace('../login.php');
       </script>";
  exit;
}
 
require 'functions.php';


$id = $_GET["id"];
$produk = query("SELECT * FROM produk WHERE id = $id")[0];

if (isset($_POST["submit"])) {

  if (ubah($_POST) > 0 ) {
    echo "
      <script>
        alert('Data Berhasil Diubah!');
        window.location.href='index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Data Gagal Diubah!');
        
      </script>
    ";
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
            <h2 class="judul">Edit Produk</h2>
            <article class="card">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?= $produk["id"]; ?>">
                    <input type="hidden" name="gambar" id="gambar" value="<?= $produk["gambar"]; ?>">
                    <input type="hidden" name="kode" id="kode" value="<?= $produk["kode"]; ?>">
                    <input type="hidden" name="tgl_produksi" id="tgl_produksi" value="<?= $produk["tgl_produksi"]; ?>">
                    <div class="jarak">
                        <center><img src="../images/<?= $produk["gambar"]; ?>" alt="" width="150px"></center><br>
                        <center><a href="edit-gambar.php?id=<?= $produk["id"]; ?>" style="color: green;">Ubah Gambar</a></center>
                    </div>
                     <div class="jarak">
                         <label for="nama">Nama Produk</label>
                         <input type="text" id="nama" name="nama" placeholder="Masukkan Nama produk" value="<?= $produk["nama"]; ?>" required>
                    </div>

                    <div class="jarak">
                         <label for="deskripsi">Deskripsi Produk</label>
                         <input type="text" id="deskripsi" name="deskripsi" value="<?= $produk["deskripsi"]; ?>" required></input>
                    </div>
                    <div class="jarak">
                         <label for="harga">Harga Produk</label>
                         <input type="text" id="harga" name="harga" value="<?= $produk["harga"]; ?>" required></input>
                    </div>
                     <div class="jarak">
                         <label for="status">Status</label>
                         <input type="radio" id="status" name="status" value="Siap Kirim" required>Siap Kirim
                         <input type="radio" id="status" name="status" value="Pre-Order" required>Pre-Order
                    </div>
                    <button type="submit" name="submit" class="btn" style="width: 100%;padding:10px;background-color: royalblue;">Ubah Produk</button>
                </form>
            </article>
        </div>
    </main>
    

   <?php include '../footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>