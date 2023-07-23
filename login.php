<?php 
session_start();
require 'functions.php';

// cek cookie untuk user
if (isset($_COOKIE['$pws5d']) && isset($_COOKIE['$ssl'])) {
    $id = $_COOKIE['$pws5d'];
    $key = $_COOKIE['$ssl'];

    // ambil data admin berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash("sha256", $row['username'])) {
        $_SESSION['user'] = true;
    }
}

// cek cookie untuk seller
if (!isset($_COOKIE['$pws5d']) && isset($_COOKIE['$ssl'])) {
    $key = $_COOKIE['$ssl'];

    // ambil data seller berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM seller");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash("sha256", $row['username'])) {
        $_SESSION['seller'] = true;     
    }
}

// cek session

if (isset($_SESSION["seller"])) {
    header("Location: admin");
    exit;
} if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}


 if (isset($_POST["login"])) {
  
  $username = $_POST["username"];
  $password = $_POST["password"];

  $seller = query("SELECT * FROM seller");
  foreach ($seller as $a) {}

  
  if ($username == $a["username"]) {
    $result = mysqli_query($conn, "SELECT * FROM seller WHERE username = '$username'");


  if (mysqli_num_rows($result) === 1 ) {
    

    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {

            // set session

            $_SESSION["login"] = true;
            $_SESSION["admin"] = true;
            $_SESSION["username"] = $username;

            // cek remember me
            if (isset($_POST['remember'])) {
                // buat cookie
                // $pws5d dan $ssl artinya adalah id dan username, disamarkan agar tidak mudah ditebak oleh penjahat
                setcookie('$ssl', hash('sha256', $row['username']), time()+3600);
            }

      header("Location: admin");
      exit;
    }

  } 

} else {
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");


  if (mysqli_num_rows($result) === 1 ) {
    

    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {


            $_SESSION["login"] = true;
            $_SESSION["user"] = true;
            $_SESSION["username"] = $username;

            // cek remember me
            if (isset($_POST['remember'])) {
                // buat cookie
                // $pws5d dan $ssl artinya adalah id dan username, disamarkan agar tidak mudah ditebak oleh penjahat
                setcookie('$pws5d', $row['id'], time()+3600);
                setcookie('$ssl', hash('sha256', $row['username']), time()+3600);
            }
      
      header("Location: index.php");
      exit;
    }
  }
}

$error = true;
  
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
    </style>
</head>

<body>
    <header>
        <?php include 'jumbotron.php'; ?>
    </header>

    <main>
        <div id="content">
            <h2 class="judul white">Login</h2>
            <?php if (isset($error)) : ?>
            <center>
                <p style="color: #E30A0A;"><b>Username / Password Salah!</b> <i class="fas fa-times-circle"></i></p>
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
                        <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                    </div>
                    <div class="jarak">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember Me</label>    
                    </div>
                    <button type="submit" name="login" class="btn" style="width: 100%;">Login</button>
                </form>
            </article>

            <center class="white">Belum mempunyai akun? <a href="register.php" class="white">Registrasi Disini</a></center>
        </div>
    </main>
    
   <?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>