<?php 
require 'functions.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0 ) {
    $success = true;
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
    <link rel="stylesheet" href="css/style.css">
    <!-- Icon dari Fontawesome -->
    <script src="https://kit.fontawesome.com/348c676099.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Ailee's Florist</title>
    <style>
        #content {
            width: 100%;
            padding: 0 350px;
        }
        @media screen and (max-width: 1000px) {
            #content {
                padding: 0 10px;
            }
        }
        .alert {
            margin: 10px 0;
            font-size: 0.9rem;
            background-color: #FCC663;
            padding: 10px;
            border: 1px solid darkorange;
        }
    </style>
</head>

<body>
    <header>
        <?php include 'jumbotron.php'; ?>
    </header>

    <main>
        <div id="content">
            <h2 class="judul">Registrasi Akun</h2>
            <?php if (isset($success)) : ?>
            <center>
                <p style="color: green;">Registrasi Berhasil <i class="fas fa-check-circle"></i></p>
            </center>
            <?php endif; ?>
            <article class="card">
                <form action="" method="post">
                    <div class="jarak">
                         <label for="username">Username</label>
                         <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
                    </div>
                    <div class="jarak">
                        <label for="password">Password</label>
                        <div class="alert"><a>Minimal 8 Digit</a></div>
                        <input type="password" id="password" name="password" placeholder="Masukkan Password" min="8" minlength="8" required>
                    </div>
                    <div class="jarak">
                         <label for="nama">Nama Lengkap</label>
                         <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <div class="jarak">
                        <label for="">Tipe Akun</label>
                        <select name="tipe" id="tipe" required>
                            <option value="b">Pembeli</option>
                            <option value="s">Seller</option>
                        </select>
                    </div>
                    <button type="submit" name="register" class="btn" style="width: 100%;">Registrasi</button>
                </form>
            </article>

            <center class='white'>Sudah mempunyai akun? <a href="login.php" class="white">Login Disini</a></center>
        </div>
    </main>
    
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
   
</body>
</html>