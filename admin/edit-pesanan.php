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
$pesanan = query("SELECT * FROM pesanan WHERE id = $id")[0];

if (isset($_POST["submit"])) {

  if (ubahdata($_POST) > 0 ) {
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
        .harga {
            padding: 5px;
            border-radius: 5px;
            color: green;
            background-color: #90DE90;
        }
    </style>
</head>

<body>
    <header>
        <?php include '../jumbotron.php'; ?>
    </header>

   <main>
        <div id="content">
            <h2 class="judul">Ubah Status</h2>
            <article class="card">
                <form action="" method="post" enctype="multipart/form-data">
                 <input type="hidden" id="id" name="id" value="<?= $pesanan['id']; ?>">
                    <div class="jarak">
                         <label for="status_pesanan">Status</label>
                         <input type="radio" id="status_pesanan" name="status_pesanan" value="Sedang Diproses" required>Sedang Diproses
                         <input type="radio" id="status_pesanan" name="status_pesanan" value="Dalam Perjalanan
                         " required>Dalam Perjalanan
                         <input type="radio" id="status_pesanan" name="status_pesanan" value="Telah Tiba" required>Telah Tiba
                    </div>
                    <button type="submit" name="submit" class="btn" style="width: 100%;background-color: green;padding: 10px;">Ubah</button>
                </form>
            </article>
        </div>
    </main>
    
    <div style="margin-top:200px"></div>

    <?php include '../footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>