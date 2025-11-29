<?php
require_once '../database.php';
$nama_jurusan_baru = $_POST['masukan-jurusan'] ?? '';
$deskripsi_jurusan_baru = $_POST['desk-jurusan'] ?? '';

// Pastikan data tidak kosong
if (empty($nama_jurusan_baru) || empty($deskripsi_jurusan_baru)) {
    // Ini seharusnya tidak terjadi jika validasi di beranda_admin.php sudah benar, 
    // tapi ini adalah pengamanan.
    header('Location: beranda_admin.php?status=add_error');
    exit;
}

// 2. Lakukan proses INSERT ke database
$sukses = simpanJurusanBaru($DBH, $nama_jurusan_baru, $deskripsi_jurusan_baru);

// 3. Redirect kembali ke beranda_admin.php dengan status
if ($sukses) {
    header('Location: beranda_admin.php?status=jurusan_added&toggle=jurusan');
    exit;
} else {
    // Jika fungsi insert gagal
    header('Location: beranda_admin.php?status=add_db_error');
    exit;
}

?>