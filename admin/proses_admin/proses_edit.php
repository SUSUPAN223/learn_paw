<?php
// FILE: proses_admin/proses_edit.php
// Pastikan $DBH sudah tersedia dari beranda_admin.php

// 1. Ambil NAMA LAMA (Patokan) dari URL
$nama_lama = $_GET['nama'] ?? null; 

// 2. Ambil data baru dari form POST (Karena action="" dan method="post")
$nama_baru = $_POST['masukan-jurusan'] ?? '';
$deskripsi_baru = $_POST['desk-jurusan'] ?? '';

// Pembersihan Input (Sanitasi Spasi)
$nama_baru_clean = trim($nama_baru); 
$deskripsi_baru_clean = trim($deskripsi_baru);

// 3. Cek Patokan
if (!$nama_lama) {
    die("Error: Patokan Jurusan lama tidak ditemukan di URL.");
}

// 4. Lookup: Ubah NAMA LAMA menjadi ID JURUSAN
$id_jurusan_stabil = getIDJurusan($DBH, $nama_lama); // Asumsi fungsi ini ada dan stabil

if (!$id_jurusan_stabil) {
    die("Error: ID Jurusan tidak ditemukan untuk Nama Patokan: " . htmlspecialchars($nama_lama));
}

// 5. Update Jurusan menggunakan ID yang Stabil
try {
    $updated_rows = updateJurusanById($DBH, $nama_baru_clean, $deskripsi_baru_clean, $id_jurusan_stabil);
    
    // Redirect setelah sukses (membersihkan URL dari action=edit)
    header('Location: beranda_admin.php?status=jurusan_updated');
    exit;

} catch (Exception $e) {
    die("Gagal mengupdate Jurusan: " . $e->getMessage());
}

?>