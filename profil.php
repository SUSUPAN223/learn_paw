<?php
session_start();
require 'database.php';

include_once 'components/tag_html.php';
include_once 'components/header.php';

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

    $id_siswa = $_SESSION['user_id']; 
    $data_siswa = getSiswaById($DBH, $id_siswa);
    $is_locked = cekStatusKunci($data_siswa);

    $kebutuhan_list = getKebutuhanList($DBH); // Semua opsi untuk Dropdown
    $data_kebutuhan_aktif = getSiswaKebutuhan($DBH, $id_siswa); // Data yang sudah tersimpan
    
    // Gabungkan data yang tersimpan ke array $data_siswa untuk pre-filling form
   
if (cekStatusKunci($data_siswa)) {
    header("Location: status.php");
    exit;
}


?>

<div class="konten-profil">
    <div class="container-profil">
        <div class="card-profil">
            
            <div class="profil">
                <img src="assets/images/profil-black.png" alt="Ikon Profil" class="profil-icon"> 
            </div>
            <?php 
    $errors = [];
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            validateName($errors, $_POST, 'nama_lengkap');
            validateTempatLahir($errors, $_POST, 'tempat_lahir');
            validateTanggalLahir($errors, $_POST, 'tgl_lahir');
            validateJenisKelamin($errors, $_POST, 'jenis_kelamin');
            validateAlamat($errors,$_POST, 'alamat');
            validateAsalsekolah($errors,$_POST,'asal_sekolah');
            validateName($errors, $_POST, 'nama_wali');
            validateStatusWali($errors, $_POST, 'status_wali');
            validateNomortelpon($errors,$_POST,'nomor_telpon');
            validateJenisKebutuhan($errors, $_POST, 'nama_kebutuhan',$kebutuhan_list);
            validateDeskripsi($errors,$_POST,'deskripsi_kebutuhan');



            if ($errors) {
                include 'form/form_profil.php';
            } else {
                require 'proses/profil_proses.php';
            }
        } else {
            include 'form/form_profil.php';
        }
    
     ?>
            
        </div>
    </div>
    
    <!-- <div class="info-block">
        <div class="container-info">
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="container-info">
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="container-info">
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="container-info">
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="container-info">
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div> -->
</div> 

<?php
include_once 'components/footer.php';
?>