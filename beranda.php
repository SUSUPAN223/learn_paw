<?php
session_start();

include_once 'components/tag_html.php';
include_once 'components/header.php';


if (!isset($_SESSION['login'])) {
    header("Location: index.php"); 
    exit; 
}


?>

    <!-- konten -->
<div class="konten-beranda" id="beranda">
    <div class="container-top">
        <div class="side-left">
            <h1>Info Pendaftaran Sekolah <span class="higlight">Inklusi.</span></h1>
            <h4>Cara Mendaftar:</h4>
            <p>1. Lengkapi profil terlebih dahulu</p>
            <p>2. Masuk ke pendaftaran</p>
            <p>3. Lengkapi data yang dibutuhkan</p>
            <a href="pendaftaran.php">Pendaftaran-></a>
        </div>
        <div class="side-right">
            <img src="assets/images/bg_sekolah_1.png" alt="">
        </div>
    </div>

    <div class="container-bot">
        <div class="texs">
            <h1 class="judul">Berita Terkini</h1>
            <p class="des-judul">Informasi Berita Terkini dari Sekolah Nirwana</p>
        </div>
        <div class="box">
            <div class="box_1">
                <div class="image-box">
                    <img src="assets/images/berita_pertama.jpeg" alt="">
                </div>

                <div class="body-box">
                    <h3>detiknews</h3>
                    <p>Kondisi 3 Korban Luka Bakar Erupsi Semeru di RSUD Haryoto Lumajang</p>
                    <a href="https://news.detik.com/berita/d-8221127/kondisi-3-korban-luka-bakar-erupsi-semeru-di-rsud-haryoto-lumajang" target="blank">Baca -></a>
                </div>
            </div>

            <div class="box_1">
                <div class="image-box">
                    <img src="assets/images/berita_kedua.jpeg" alt="">
                </div>

                <div class="body-box">
                    <h3>detikjatim</h3>
                    <p>Pro Kontra Penggunaan Etanol Campuran Bahan Bakar, Ini Penjelasan Dosen UMM</p>
                    <a href="https://www.detik.com/jatim/berita/d-8215388/pro-kontra-penggunaan-etanol-campuran-bahan-bakar-ini-penjelasan-dosen-umm" target="blank">Baca -></a>
                </div>
            </div>

            <div class="box_1">
                <div class="image-box"><img src="assets/images/berita_ketiga.jpeg" alt=""></div>
                <div class="body-box">
                    <h3>BERITA PRODI Teknik Informatika</h3>
                    <p>Prestasi Gemilang! Prodi Teknik Informatika Resmi Raih Akreditasi Unggul dari LAM INFOKOM
    </p>
                    <a href="https://informatika.trunojoyo.ac.id/berita-prodi/61" target="blank">Baca -></a>
                </div>
            </div>
        </div>
    

        <div class="button-bot">
            <a href="https://www.detik.com/" target="blank">Lihat Semua Berita -></a>
        </div>
    </div>
</div>


<?php
include_once 'components/footer.php';
?>