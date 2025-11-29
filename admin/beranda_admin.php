<?php
session_start();
require_once '../database.php';
include_once '../components/tag_html.php';
include_once 'tombol/tombol_jurusan.php';
include_once 'tombol/tombol_edit_jurusan.php';
include_once 'tombol/tombol_edit_kebutuhan.php';
include_once 'tombol/tombol_daftar_siswa.php';
include_once 'tombol/tombol_kebutuhan.php';
include_once 'tombol/tombol_add_kebutuhan.php';
include_once 'tombol/tombol_add.php';




if (!isset($_SESSION['login'])) {
    header("Location: ../index.php"); 
    exit; 
}

$errors = [];

?>
<div class="site-header">
    <?php 
    include_once '../components/logo.php';
    include_once '../components/logout.php';
    ?>
</div>

<div class="konten-admin">
    <div class="container-admin">
        <div class="daftar-jurusan">
            <h3>Daftar Jurusan</h3>
            <a href="beranda_admin.php?toggle=jurusan" class="">Lihat Daftar Jurusan</a>
            <a href="beranda_admin.php?toggle=tambah">Tambah Jurusan</a>
        </div>

        <div class="daftar-siswa">
            <h3>Daftar Calon Siswa</h3>
            <a href="beranda_admin.php?toggle=siswa" class="">Lihat Calon Siswa</a>
            <a href="beranda_admin.php?toggle=kebutuhan" class="">Daftar Kebutuhan Khusus</a>
            <a href="beranda_admin.php?toggle=menambah">Tambah Kebutuhan</a>
        </div>
    </div>

<?php if ($tampilkan_add_jurusan): ?>
    <?php 
       if ($_SERVER['REQUEST_METHOD']=='POST') { 
            // Validasi
        validateJurusan($errors, $_POST, 'masukan-jurusan');
        validateDeskripsi($errors, $_POST, 'desk-jurusan');
        cekDuplikasi($errors, $DBH, 'JURUSAN', 'NAMA_JURUSAN', $_POST['masukan-jurusan'], 'jurusans', '*Jurusan sudah ada');

        if ($errors) {
            include 'form_admin/form_tambah.php';
        } else {
                // VALIDASI SUKSES -> Lanjut ke proses update
            require 'proses_admin/proses_add.php';
        }
    } else {
            // Render form saat GET pertama kali (Tombol Edit diklik)
        include 'form_admin/form_tambah.php';
    }
    ?>
<?php endif; ?>

    
    <?php if ($tampilkan_edit_jurusan): ?>
       <?php 
    
        // KONDISI INI BERLAKU KARENA action=""
        // Perintah POST akan dikirim ke URL yang sama: beranda_admin.php?action=edit&nama=...
       if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_GET['action']) && $_GET['action'] == 'edit') { 
            // Validasi
        validateJurusan($errors, $_POST, 'masukan-jurusan');
        validateDeskripsi($errors, $_POST, 'desk-jurusan');

        if ($errors) {
                // Jika error, ambil kembali data lama untuk di-sticky-kan
            $nama_lama_get = $_GET['nama'] ?? ''; 
            $data_edit = getJurusanByNama($DBH, $nama_lama_get); 

            include 'form_admin/form_edit.php';
        } else {
                // VALIDASI SUKSES -> Lanjut ke proses update
            require 'proses_admin/proses_edit.php';
        }
    } else {
            // Render form saat GET pertama kali (Tombol Edit diklik)
        include 'form_admin/form_edit.php';
    }
    ?>
<?php endif; ?>

<?php if ($tampilkan_add_kebutuhan): ?>
    <?php 
       if ($_SERVER['REQUEST_METHOD']=='POST') { 
            // Validasi Kebutuhan (Asumsi ada fungsi validation: validateKebutuhan & validateDeskripsi)
        validateJurusan($errors, $_POST, 'nama-kebutuhan');
        validateDeskripsi($errors, $_POST, 'desk-kebutuhan');
        // Asumsi ada fungsi cekDuplikasi untuk kebutuhan
        cekDuplikasi($errors, $DBH, 'siswa_kebutuhan_khusus', 'NAMA_KEBUTUHAN', $_POST['nama-kebutuhan'], 'kebutuhans', '*Kebutuhan sudah ada');

        if ($errors) {
            // Asumsi file form untuk tambah kebutuhan adalah form_tambah_kebutuhan.php
            include 'form_admin/form_kebutuhan.php'; 
        } else {
                // VALIDASI SUKSES -> Lanjut ke proses add
            // Asumsi file proses add kebutuhan adalah proses_add_kebutuhan.php
            require 'proses_admin/proses_add_kebutuhan.php'; 
        }
    } else {
            // Render form saat GET pertama kali
        include 'form_admin/form_kebutuhan.php'; 
    }
    ?>
<?php endif; ?>

<?php if ($tampilkan_edit_kebutuhan): ?>
       <?php 
    
        // Kondisi ini akan berlaku jika POST dikirim ke URL yang sama (beranda_admin.php?action=edit_kebutuhan&nama=...)
       if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_GET['action']) && $_GET['action'] == 'edit_kebutuhan') { 
            // Validasi Kebutuhan (Asumsi ada fungsi validation: validateKebutuhan & validateDeskripsi)
        validateJurusan($errors, $_POST, 'nama-kebutuhan');
        validateDeskripsiwajib($errors, $_POST, 'desk-kebutuhan');

        if ($errors) {
            $nama_lama_get = $_GET['nama'] ?? ''; 
            $data_edit_kebutuhan = getKebutuhanByNama($DBH, $nama_lama_get); 
            include 'form_admin/form_edit_kebutuhan.php';
        } else {
                // VALIDASI SUKSES -> Lanjut ke proses update
            // Asumsi file proses edit kebutuhan adalah proses_edit_kebutuhan.php
            require 'proses_admin/proses_edit_kebutuhan.php';
        }
    } else {
            // Render form saat GET pertama kali (Tombol Edit diklik)
        // Asumsi file form untuk edit kebutuhan adalah form_edit_kebutuhan.php
        include 'form_admin/form_edit_kebutuhan.php';
    }
    ?>
<?php endif; ?>

<?php if ($tampilkan_tabel_kebutuhan): ?>
<div class="tabel-jurusan">
    <table>
        <tr>
            <th>No</th>
            <th>Kebutuhan</th>
            <th>Deskripsi Kebutuhan</th>
            <th>Aksi</th>
        </tr>
        
            <?php 
            $no = 1;
            // Gunakan foreach untuk menampilkan data
            foreach ($daftar_kebutuhan as $kebutuhan) : 
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($kebutuhan['NAMA_KEBUTUHAN']); ?></td>
                    <td><?php echo htmlspecialchars($kebutuhan['DESKRIPSI_KEBUTUHAN']); ?></td>
                    <td>
                        <div class="btn-aksi">
                                <a href="beranda_admin.php?action=edit_kebutuhan&nama=<?php echo urlencode($kebutuhan['NAMA_KEBUTUHAN']); ?>" class="edit">Edit</a>

                            <form action="proses_admin/proses_delete_kebutuhan.php?action=delete_kebutuhan&namak=<?php echo urlencode($kebutuhan['NAMA_KEBUTUHAN']); ?>" method="post" >
                                <button type="submit" class="delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        
    </table>
</div>
<?php endif; ?>
<?php if ($tampilkan_tabel_jurusan): ?>
<!-- output tabel daftar jurusan -->
<div class="tabel-jurusan">
    <table>
        <tr>
            <th>No</th>
            <th>Jurusan</th>
            <th>Deskripsi Jurusan</th>
            <th>Aksi</th>
        </tr>
        
            <?php 
            $no = 1;
            // Gunakan foreach untuk menampilkan data
            foreach ($daftar_jurusan as $jurusan) : 
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($jurusan['NAMA_JURUSAN']); ?></td>
                    <td><?php echo htmlspecialchars($jurusan['DESKRIPSI_JURUSAN']); ?></td>
                    <td>
                        <div class="btn-aksi">
                                <a href="beranda_admin.php?action=edit&nama=<?php echo urlencode($jurusan['NAMA_JURUSAN']); ?>" class="edit">Edit</a>

                            <form action="proses_admin/proses_delete.php?action=delete&nama=<?php echo urlencode($jurusan['NAMA_JURUSAN']); ?>" method="post" >
                                <button type="submit" class="delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        
    </table>
</div>
<?php endif; ?>
<!-- output tabel daftar calon siswa -->
<?php

$daftar_siswa = getDaftarSiswa($DBH);


if (!isset($_SESSION['login'])) {
    header("Location: ../index.php"); 
    exit; 
}
$errors = [];

// Handle update status siswa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status_baru'])) {
    $id_siswa = $_POST['id_siswa'];
    $status_baru = $_POST['status_baru'];

    updateStatusPendaftaran($DBH, $id_siswa, $status_baru);

    // refresh tanpa POST (mencegah submit ulang)
    header("Location: beranda_admin.php");
    exit;
}

?>



<?php if ($tampilkan_tabel_siswa): ?>
<div class="tabel-siswa">
    <table>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Temat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Asal Sekolah</th>
            <th>Nama Kebutuhan</th>
            <th>Deskripsi Kebutuhan</th>
            <th>Wali</th>
            <th>No telpon</th>
            <th>Berkas</th>
            <th>Status</th>
        </tr>
        <?php if (!empty($daftar_siswa)): ?>
            <?php
            $no = 1;
            foreach ($daftar_siswa as $siswa):
            ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($siswa['NAMA_LENGKAP']); ?></td>
            <td><?= htmlspecialchars($siswa['TEMPAT_LAHIR']); ?></td>
            <td><?= htmlspecialchars($siswa['TANGGAL_LAHIR']); ?></td>
            <td><?= htmlspecialchars($siswa['JENIS_KELAMIN']); ?></td>
            <td><?= htmlspecialchars($siswa['ALAMAT']); ?></td>
            <td><?= htmlspecialchars($siswa['ASAL_SEKOLAH']); ?></td>
            <td><?= htmlspecialchars($siswa['NAMA_KEBUTUHAN']); ?></td>
            <td><?= htmlspecialchars($siswa['DESKRIPSI_KEBUTUHAN']); ?></td>
            <td><?= htmlspecialchars($siswa['Wali']); ?></td>
            <td><?= htmlspecialchars($siswa['No_Telpon_Wali']); ?></td>
            <td>
                <?php if (!empty($siswa['Berkas'])): ?>
                    <?php 
                        $file = htmlspecialchars($siswa['Berkas']); 
                        echo $file;

                    ?>

                    
                    <!-- <img src="../assets/ijazah/<?= $file; ?>" alt="Berkas"> -->
                    <a href="../assets/ijazah/<?= $file; ?>" 
            target="_blank">Lihat Asli</a>
                <?php else: ?>
        <span>Tidak ada berkas</span>
    <?php endif; ?>
            </td>
            <td>
                <form action="beranda_admin.php" method="POST">
                    <input type="hidden" name="id_siswa" value="<?= $siswa['ID_SISWA']; ?>">
                    <select name="status_baru" id="status-<?= $siswa['ID_SISWA']; ?>">
                        <option value="" disabled>-- Status Calon Siswa --</option>
                        <option value="Di verifikasi" <?= ($siswa['Status'] == 'Di verifikasi') ? 'selected' : ''; ?>>Di verifikasi</option>
                        <option value="Lulus" <?= ($siswa['Status'] == 'Lulus') ? 'selected' : ''; ?>>Lulus</option>
                        <option value="Tidak Lulus" <?= ($siswa['Status'] == 'Tidak Lulus') ? 'selected' : ''; ?>>Tidak Lulus</option>
                    </select>
                    <button type="submit" class="drop-status">Simpan</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </table>
</div>

<?php endif; ?>

</div>

<?php
include_once '../components/footer.php';
?>