<?php
// ...
$data_edit = null;
// Variabel ini akan menjadi TRUE jika data ditemukan, mengontrol tampilan form
$tampilkan_edit_jurusan = false; 

if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['nama'])) {
    $nama_jurusan_edit = $_GET['nama']; 
    
    // Panggil fungsi database
    $data_edit = getJurusanByNama($DBH, $nama_jurusan_edit); 
    
    // Jika data berhasil diambil, TAMPILKAN FORM
    if ($data_edit) {
        $tampilkan_edit_jurusan = true; 
    }
}
?>