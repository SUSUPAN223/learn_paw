<?php
require_once '../database.php';
$nama_kebutuhan_baru = $_POST['nama-kebutuhan'] ?? '';
$deskripsi_kebutuhan_baru = $_POST['desk-kebutuhan'] ?? '';

// Pastikan data tidak kosong
if (empty($nama_kebutuhan_baru) || empty($deskripsi_kebutuhan_baru)) {
    // Ini seharusnya tidak terjadi jika validasi di beranda_admin.php sudah benar, 
    // tapi ini adalah pengamanan.
    header('Location: beranda_admin.php?status=add_error');
    exit;
}

// 2. Lakukan proses INSERT ke database
$sukses = simpanKebutuhanBaru($DBH, $nama_kebutuhan_baru, $deskripsi_kebutuhan_baru);

// 3. Redirect kembali ke beranda_admin.php dengan status
if ($sukses) {
    header('Location: beranda_admin.php?status=kebutuhan_added');
    exit;
} else {
    // Jika fungsi insert gagal
    header('Location: beranda_admin.php?status=add_db_error');
    exit;
}

?>