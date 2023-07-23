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
        } 
    </style>
</head>

<body>
     <header>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="pesanan.php">Data Pesanan</a></li>
                <li><a href="../logout.php" class="btn" style="border-bottom: none;">Logout</a></li>
            </ul>
        </nav>
        <?php include '../jumbotron.php'; ?>
    </header>

    <main>
         <article class="card">
                <center><h3 style="color:royalblue;">Pilih Jenis Laporan</h3></center>
        </article>

       
        <div class="card">
            <div class="row">
                <div class="col">
                    <h3>Laporan Bulanan</h3>
                    <form method="get" action="laporan-bulan.php">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <input type="number" name="bulan" placeholder="Bulan" class="form-control" required>
                                </div>
                                <div class="col">
                                    <input type="number" name="tahun" placeholder="Tahun" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Cetak</button>
                    </form>
                </div>
                <div class="col">
                    <h3>Laporan Tahunan</h3>
                    <form method="get" action="laporan-tahunan.php">
                        <div class="mb-3">
                            <input type="number" name="tahun" placeholder="Tahun" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-info">Cetak</button>
                    </form>
                </div>
            </div>
        </div>
        
           
    </main>

   <?php include '../footer.php'; ?>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>