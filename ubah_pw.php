<?php
// Ganti 'admin123' dengan password yang Anda mau
$password_asli = 'admin123';

// Generate hash
$hash = password_hash($password_asli, PASSWORD_DEFAULT);

// Tampilkan di layar
echo "Password Asli: " . $password_asli . "<br>";
echo "Hash untuk Database: " . $hash;
?>