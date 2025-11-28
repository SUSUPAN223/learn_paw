<?php 
    $url_logout = 'proses/logout_proses.php'; 

    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {

        $url_logout = '../proses/logout_proses.php';
    } 
    $url_pendaftaran = 'pendaftaran.php'; 

    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {

        $url_pendaftaran = '../pendaftaran.php';
    } 

    $url_beranda = 'beranda.php';
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        $url_beranda = '../beranda.php';
    }

    $url_profil = 'profil.php';
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        $url_profil = '../profil.php';
    }
?>