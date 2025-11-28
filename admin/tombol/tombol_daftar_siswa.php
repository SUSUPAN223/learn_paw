<?php
require_once '../database.php';
// --- INISIALISASI SESSION (DEFAUT) ---
if (!isset($_SESSION['tampil_daftar'])) {
    $_SESSION['tampil_daftar'] = false; // Default: Sembunyikan
}

// --- LOGIKA TOGGLE ---
if (isset($_GET['toggle']) && $_GET['toggle'] == 'siswa') {
    
        // Logika Toggle: Balik nilai session saat tombol 'siswa' diklik
        $_SESSION['tampil_daftar'] = !$_SESSION['tampil_daftar']; 
        $_SESSION['tampil_jurusan'] = false; // Sembunyikan tabel jurusan
        $_SESSION['tampil_add_j'] = false;
        $_SESSION['tampil_kebutuhan'] = false;
        $_SESSION['tampil_add_k'] = false;
    

    
    // REDIRECT BERSIH
    header('Location: beranda_admin.php');
    exit;
}


$tampilkan_tabel_siswa = $_SESSION['tampil_daftar'];
?>