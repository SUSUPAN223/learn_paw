<?php
// FILE: proses_admin/proses_delete.php

// Pastikan session dan koneksi database dipanggil
session_start();
// Sesuaikan path require_once ke database.php Anda
require_once '../../database.php'; 

// Pengecekan keamanan: Pastikan pengguna sudah login
if (!isset($_SESSION['login'])) {
    header("Location: ../index.php"); 
    exit;
}

// Hanya proses jika method POST dan ada parameter 'nama' di GET
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['nama'])) {
    $nama_jurusan_delete = $_GET['nama'];

    // 1. Lakukan Lookup ID (Stabilisasi Kunci)
    try {
        // Asumsi fungsi getIDJurusan($DBH, $nama) sudah ada di database.php
        $id_jurusan_stabil = getIDJurusan($DBH, $nama_jurusan_delete); 

        if ($id_jurusan_stabil) {
            // 2. Jalankan Fungsi Delete
            // Asumsi fungsi deleteJurusanById($DBH, $id) sudah ada di database.php
            deleteJurusanById($DBH, $id_jurusan_stabil); 
            $status = 'jurusan_deleted';
        } else {
            $status = 'jurusan_not_found';
        }
        
        // 3. Redirect kembali ke beranda_admin.php
        header('Location: ../beranda_admin.php?status=' . $status);
        exit;

    } catch (Exception $e) {
        // Log error dan redirect dengan status error
        error_log("Gagal Hapus Jurusan: " . $e->getMessage());
        header('Location: ../beranda_admin.php?status=delete_error');
        exit;
    }
} else {
    // Jika akses langsung ke file ini tanpa POST
    header('Location: ../beranda_admin.php');
    exit;
}
?>