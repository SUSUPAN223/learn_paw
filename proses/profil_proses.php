<?php
// File ini HANYA dipanggil oleh profil.php jika validasi SUKSES.
// Asumsi $DBH, $_SESSION, dan $_POST sudah tersedia.

$id_siswa = $_SESSION['user_id'];

try {
    $DBH->beginTransaction(); 

    // 1. SIMPAN DATA WALI (Menggunakan 'nomor_telpon' sesuai permintaan Anda)
    simpanDataWali($DBH, $id_siswa, $_POST['nama_wali'], $_POST['status_wali'], $_POST['nomor_telpon']);
    
    // 2. KONVERSI TANGGAL
    $tgl_mentah = $_POST['tgl_lahir']; 
    $tgl_database = date('Y-m-d', strtotime($tgl_mentah));

    // 3. UPDATE DATA SISWA (PROFIL_SISWA)
    // PERHATIAN: Kolom BERKEBUTUHAN_KHUSUS dan DESKRIPSI_KEBUTUHAN telah DIHAPUS dari query ini!
    $sql_siswa = "UPDATE PROFIL_SISWA SET 
                    NAMA_LENGKAP = ?, 
                    TEMPAT_LAHIR = ?, 
                    TANGGAL_LAHIR = ?, 
                    JENIS_KELAMIN = ?, 
                    ALAMAT = ?, 
                    ASAL_SEKOLAH = ?
                  WHERE ID_SISWA = ?";

    $stmt = $DBH->prepare($sql_siswa);
    $stmt->execute([
        $_POST['nama_lengkap'],
        $_POST['tempat_lahir'],
        $tgl_database,
        $_POST['jenis_kelamin'],
        $_POST['alamat'],
        $_POST['asal_sekolah'],
        $id_siswa
    ]);

    // 4. URUS TABEL RELASI KEBUTUHAN (CRUCIAL LOGIC)
    $jenis_kebutuhan_pilihan = $_POST['nama_kebutuhan'] ?? '';

    // A. Hapus data lama di tabel relasi KEBUTUHAN (Pembersihan / Update)
    $DBH->exec("DELETE FROM KEBUTUHAN WHERE ID_SISWA = $id_siswa");

    // B. Jika user memilih jenis kebutuhan (Bukan 'Tidak Ada'), lakukan INSERT
    if ($jenis_kebutuhan_pilihan !== '') {
        
        // C. Cari ID Master Kebutuhan
        $id_kebutuhan = getIDKebutuhan($DBH, $jenis_kebutuhan_pilihan); // Menggunakan fungsi dari database.php
        
        if ($id_kebutuhan) {
            // D. INSERT data ke tabel relasi KEBUTUHAN
            $sql_relasi = "INSERT INTO KEBUTUHAN (ID_SISWA, ID_SISWA_KEBUTUHAN, DESKRIPSI_SISWA_KHUSUS) 
                           VALUES (?, ?, ?)";
            $stmt = $DBH->prepare($sql_relasi);
            
            $stmt->execute([
                $id_siswa, 
                $id_kebutuhan, 
                $_POST['deskripsi_kebutuhan'] ?? null 
            ]);
        }
    }
    
    $DBH->commit(); // Simpan permanen

    // 5. REDIRECT SUKSES MURNI PHP
    header("Location: pendaftaran.php?status=sukses_profil");
    exit;

} catch (Exception $e) {
    $DBH->rollBack(); 
    die("Terjadi Kesalahan Sistem Saat Update Profil: " . $e->getMessage());
}
?>