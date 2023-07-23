<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "ailees");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	};
	return $rows;
};

function registrasi($data) {
	global $conn;

	$username = mysqli_real_escape_string($conn, $data["username"]);
	$password_sebelum = mysqli_real_escape_string($conn, $data["password"]);
	$nama = mysqli_real_escape_string($conn, $data["nama"]);
	$tipe = mysqli_real_escape_string($conn, $data["tipe"]);

	// cek username seller sudah ada atau belum

	$cekusernameseller = "SELECT * FROM seller where username='$username'";
	$prosescek= mysqli_query($conn, $cekusernameseller);

	if (mysqli_num_rows($prosescek)>0) { 
	    echo "<script>alert('Username Sudah Digunakan!');history.go(-1) </script>";
	    exit;
	}

	// cek username user sudah ada atau belum

	$cekusernameuser = "SELECT * FROM user where username='$username'";
	$prosescek= mysqli_query($conn, $cekusernameuser);

	if (mysqli_num_rows($prosescek)>0) { 
	    echo "<script>alert('Username Sudah Digunakan!');history.go(-1) </script>";
	    exit;
	}

	// enkripsi password
	$password = password_hash($password_sebelum, PASSWORD_DEFAULT);

	if ($tipe == 'b') {
		// Masukkan Data ke Database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password', '$nama')");
	return mysqli_affected_rows($conn);
	}

	if ($tipe == 's') {
		// Masukkan Data ke Database
	mysqli_query($conn, "INSERT INTO seller VALUES('', '$username', '$password', '$nama')");
	return mysqli_affected_rows($conn);
	}

	
}


function pesanan($data) {
	global $conn;

	$username = mysqli_real_escape_string($conn, $data["username"]);
	$produk = mysqli_real_escape_string($conn, $data["produk"]);
	$nama_penerima = mysqli_real_escape_string($conn, $data["nama_penerima"]);
	$alamat_penerima = mysqli_real_escape_string($conn, $data["alamat_penerima"]);
	$nohp_penerima = mysqli_real_escape_string($conn, $data["nohp_penerima"]);
	$tanggal = $data["tanggal"];
	$total_bayar = mysqli_real_escape_string($conn, $data["total_bayar"]);
	$status = mysqli_real_escape_string($conn, $data["status"]);

	$gambar = upload();

	// Masukkan Data ke Database
	mysqli_query($conn, "INSERT INTO pesanan VALUES('', '$username',  '$produk', '$nama_penerima', '$alamat_penerima', '$nohp_penerima', '$tanggal', '$total_bayar', '$gambar', '$status', NULL)");
	return mysqli_affected_rows($conn);
}

function tambah($data) {
	global $conn;

	// htmlspecialchars berfungsi untuk tidak menjalankan script
	$id_produk = htmlspecialchars($data["id_produk"]);
	$username = htmlspecialchars($data["username"]);
	$nama = htmlspecialchars($data["nama"]);
	$harga = htmlspecialchars($data["harga"]);


		// tambahkan ke database
		// NULL digunakan karena jika dikosongkan maka akan terjadi error di database yang sudah online
		// sedangkan jika masih di localhost, bisa memakai ''
	mysqli_query($conn, "INSERT INTO keranjang VALUES(NULL, '$id_produk', '$username', '$nama', '$harga')");
	return mysqli_affected_rows($conn);
}

function upload() {
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];


    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

    return $namaFileBaru;
}