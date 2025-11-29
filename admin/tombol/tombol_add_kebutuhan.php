<?php

// --- INISIALISASI SESSION (DEFAUT) ---
// Pastikan status defaultnya FALSE jika belum pernah diatur
if (!isset($_SESSION['tampil_add_k'])) {
    $_SESSION['tampil_add_k'] = false; // Default: Sembunyikan
}

// --- LOGIKA TOGGLE ---
if (isset($_GET['toggle']) && $_GET['toggle'] == 'menambah') {
    // Jika tombol diklik (ada parameter 'toggle=jurusan'), 
    // ubah status menjadi kebalikannya.
    
    $_SESSION['tampil_add_k'] = !$_SESSION['tampil_add_k'];
   $_SESSION['tampil_daftar'] = false;
    $_SESSION['tampil_add_j'] = false;
    $_SESSION['tampil_kebutuhan'] = false;
    
    // REDIRECT BERSIH: Hapus parameter 'toggle' dari URL
    // Ini penting agar status tidak berubah lagi jika user me-refresh halaman.
    header('Location: beranda_admin.php');
    exit;
}


$tampilkan_add_kebutuhan = $_SESSION['tampil_add_k'] ?? false;

?>