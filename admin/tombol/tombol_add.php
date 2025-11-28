<?php


if (!isset($_SESSION['tampil_add_j'])) {
    $_SESSION['tampil_add_j'] = false; // Default: Sembunyikan
}

if (isset($_GET['toggle'])) {
    if ($_GET['toggle'] == 'tambah') {
        $_SESSION['tampil_add_j'] = !$_SESSION['tampil_add_j'];
        $_SESSION['tampil_daftar'] = false; // Sembunyikan tabel siswa
        $_SESSION['tampil_jurusan'] = false;
        $_SESSION['tampil_kebutuhan'] = false;
        $_SESSION['tampil_add_k'] = false;
    }

    // Ubah redirect bersih tanpa parameter 'action=add'
    header('Location: beranda_admin.php'); 
    exit;
}


$tampilkan_add_jurusan = $_SESSION['tampil_add_j'] ?? false;

?>