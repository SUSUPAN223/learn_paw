<?php
// Pastikan $DBH sudah tersedia dari file yang meng-include ini

$data_edit_kebutuhan = null;
// Variabel ini akan menjadi TRUE jika data ditemukan, mengontrol tampilan form edit kebutuhan
$tampilkan_edit_kebutuhan = false; 

if (isset($_GET['action']) && $_GET['action'] == 'edit_kebutuhan' && isset($_GET['nama'])) {
    $nama_kebutuhan_edit = $_GET['nama']; 
    
    // Panggil fungsi database (Asumsi ada fungsi getKebutuhanByNama)
    $data_edit_kebutuhan = getKebutuhanByNama($DBH, $nama_kebutuhan_edit); 
    
    // Jika data berhasil diambil, TAMPILKAN FORM
    if ($data_edit_kebutuhan) {
        $tampilkan_edit_kebutuhan = true; 
        
        // Sembunyikan semua tabel dan form lain saat form edit muncul
        $_SESSION['tampil_jurusan'] = false;
        $_SESSION['tampil_daftar'] = false;
        $_SESSION['tampil_add_j'] = false;
        $_SESSION['tampil_kebutuhan'] = false; // Sembunyikan tabel kebutuhan
        $_SESSION['tampil_add_k'] = false;
    }
}
?>