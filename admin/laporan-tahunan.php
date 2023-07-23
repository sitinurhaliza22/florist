<?php 
session_start();

if (!isset($_SESSION['admin'])) {
   echo "<script>
         window.location.replace('../login.php');
       </script>";
  exit;
}

$t = $_GET['tahun'];

require 'functions.php';
  $pdt = mysqli_query($conn, "SELECT sum(total_bayar) as pendapatan FROM pesanan WHERE year(date_time) = $t");

  foreach ($pdt as $p) {}
  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Ailee's Florist</title>
    <style>
        th, td {
            text-align: center;
        }
    </style>
</head>

<body>

    <br><br><br><br>
    <h3 align="center">Laporan Pendapatan Tahunan</h3>
    <br>
     
     <table class="table">
         <tr>
             <th>Tahun : <?= $_GET['tahun']; ?></th>
         </tr>
     </table>
     <br>
     <p align="center" class="fw-bold">Pendapatan Tahun Ini : <span class="text-success">Rp<?= number_format($p['pendapatan'],2,',','.'); ?></span></p>

   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

   <script>window.print();</script>
</body>
</html>