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
?>

<div class="konten-status" id="status">
    <div class="container-status">
        <h1 class="judul-status">Riwayat & Status Pendaftaran</h1>

        <div class="data">
        	<span class="label">Nama</span>
        	<span class="titik-dua">:</span>
        	<span class="value"><?php echo htmlspecialchars($data_siswa['NAMA_LENGKAP'] ?? ''); ?></span>
        </div>
        <div class="data">
        	<span class="label">Username</span>
        	<span class="titik-dua">:</span>
        	<span class="value"><?php echo htmlspecialchars($data_siswa['USER_SISWA'] ?? ''); ?></span>
        </div>
        <div class="data">
        	<span class="label">Email</span>
        	<span class="titik-dua">:</span>
        	<span class="value"><?php echo htmlspecialchars($data_siswa['EMAIL_SISWA'] ?? ''); ?></span>
        </div>
        <div class="data">
        	<span class="label">Jenis Kelamin</span>
        	<span class="titik-dua">:</span>
        	<span class="value"><?php echo htmlspecialchars($data_siswa['JENIS_KELAMIN'] ?? '') ?></span>
        </div>
        <div class="status">
        	<p class="value-status"><?php echo htmlspecialchars($data_siswa['STATUS_PENDAFTARAN'] ?? 'BELUM MENDAFTAR'); ?></p>
        </div>
    </div>
</div>

<?php
include_once 'components/footer.php';
?>