<?php 
session_start();

if (!isset($_SESSION['admin'])) {
   echo "<script>
         window.location.replace('../login.php');
       </script>";
  exit;
}

require 'functions.php';
$username = $_SESSION['username'];
  $produk = mysqli_query($conn, "SELECT * FROM produk LEFT JOIN gudang ON produk.id = gudang.id WHERE username_seller = '$username'");
  $total_produk = mysqli_num_rows($produk);
  
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
    </style>
</head>

<body>
     <header>
        <nav>
            <ul>
                <li><a href="pesanan.php">Data Pesanan</a></li>
                <li><a href="../logout.php" class="btn" style="border-bottom: none;">Logout</a></li>
            </ul>
        </nav>
        <?php include '../jumbotron.php'; ?>
    </header>

    <main>
         <article class="card">
                <center><h3 style="color:royalblue;">Katalog Produk</h3></center>
        </article>

        <div id="content">
            <?php foreach ($produk as $p) : ?>
            <div class="flex">
                <div class="card">
                    <img src="../images/<?= $p["gambar"]; ?>" class="featured-image">
                    <h4><?= $p["nama"]; ?></h4>
                    <p><?= $p["deskripsi"]; ?></p>
                    <p>Harga : <b>Rp<?= number_format($p['harga'],2,',','.'); ?></b></p>
                    <p>Stock : <b><?= $p["stok"]; ?></b></p>
                    <p>Tanggal Produksi : <b><?= $p["tgl_produksi"]; ?></b></p>
                    <p style="color: green;"><b><?= $p["status"]; ?></b></p>
                    <p><a href="edit-item.php?id=<?= $p["id"]; ?>" class="btn" style="background-color: orange;">Edit</a></p>
                    <p><a href="edit-stok.php?id=<?= $p["id"]; ?>" class="btn" style="background-color: orange;">Edit Stock</a></p>
                    <p><a href="hapus-item.php?id=<?= $p["id"]; ?>" class="btn">Hapus</a></p>
               </div>
            </div>
            <?php endforeach; ?>
        </div>

        <aside>
            <div class="card">
                <center><p>Total Produk : <b><span style="color: #FF5585"><?= $total_produk; ?></span></b></p></center>
            </div>

            <a href="tambah.php" style="text-decoration: none;"><div class="card">
                <center><p>Tambah Produk</p></center>
            </div></a>

            <a href="pesanan.php" style="text-decoration: none;">
                <div class="card">
                    <center>Data Pesanan Pelanggan</center>
                </div>
            </a>

            <a href="laporan.php" style="text-decoration: none;">
                <div class="card">
                    <center>Laporan</center>
                </div>
            </a>
        </aside>
           
    </main>

   <?php include '../footer.php'; ?>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>