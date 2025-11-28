<?php 
// require_once '../koneksi.php';

$username = $_POST['user'];
$email = $_POST['email'];
$password_mentah = $_POST['password'];

// VALIDASI PASSWORD 
$password = password_hash($password_mentah, PASSWORD_DEFAULT);

try {
	$stmnt = $DBH->prepare("INSERT INTO profil_siswa (USER_SISWA,EMAIL_SISWA,PASS_SISWA) VALUES (?, ?, ?)");
	$stmnt->execute([
		$username,
		$email,
		$password
	]);
	echo "Register berhasil! /n Mengalihkan kehalaman login...";
	header("Location:index.php?status=sukses");
	exit;

} catch (PDOException $e) {
	die("Error : Gagal mendaftarkan akun." . $e->getMessage());
} 

 ?>