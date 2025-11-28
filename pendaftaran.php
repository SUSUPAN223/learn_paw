<?php
    session_start();
    include_once 'components/tag_html.php';
    include_once 'components/header.php';
    require 'database.php';


    
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

    $id_siswa = $_SESSION['user_id']; 
    $data_siswa = getSiswaById($DBH, $id_siswa);
    cekPendaftaran($DBH, $id_siswa);

$daftar_jurusan = getDaftarJurusan($DBH);

if (cekStatusKunci($data_siswa)) {
    header("Location: status.php");
    exit;
}

?>

<div class="konten-pendaftaran" id="pendaftaran">
    <div class="container-pendaftaran">
        <div class="card-pendaftaran">
            <div class="profil">
                <h3>Pendaftaran</h3>
            </div>
            <?php 
            $errors = [];
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                validateJurusanSatu($errors, $_POST, 'jurusan-satu',$daftar_jurusan);
                validateJurusanDua($errors, $_POST, 'jurusan-dua','jurusan-satu', $daftar_jurusan);
                validateIjazah($errors,$_FILES,'file_ijazah');


                if ($errors) {
                    include 'form/form_pendaftaran.php';
                } else {
                    require 'proses/pendaftaran_proses.php';
                }
            } else {
                include 'form/form_pendaftaran.php';
            }
             ?>

        </div>
    </div>
</div>

<?php
    include_once 'components/footer.php';
?>