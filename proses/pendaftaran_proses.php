<?php

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php"); 
    exit; 
}

try {
    $DBH->beginTransaction(); 


    // 1. UPLOAD FILE (Wajib ada agar file tersimpan di folder)
    $file_ijazah = $_FILES['file_ijazah'];
    $ext = strtolower(pathinfo($file_ijazah['name'], PATHINFO_EXTENSION));

    if ($ext === 'jpeg') $ext = 'jpg';
    
    // Nama file unik: ijazah_ID_WAKTU.jpg
    $nama_file_baru = 'ijazah_' . $_SESSION['user_id'] . '_' . time() . '.' . $ext;
    $tujuan = 'assets/ijazah/' . $nama_file_baru;

    // Pindahkan file dari temp ke folder tujuan
    move_uploaded_file($file_ijazah['tmp_name'], $tujuan);

    // 2. INSERT KE TABEL PENDAFTARAN
    $sql_daftar = "INSERT INTO PENDAFTARAN (TANGGAL_DAFTAR, STATUS_PENDAFTARAN, JENIS_BERKAS, LOKASI_BERKAS) 
                   VALUES (NOW(), 'Menunggu Verifikasi', 'Ijazah', ?)";
    $stmt = $DBH->prepare($sql_daftar);
    $stmt->execute([$nama_file_baru]);
    
    $id_daftar_baru = $DBH->lastInsertId();

    // 3. UPDATE PROFIL SISWA (Tempelkan ID Pendaftaran)
    $sql_update = "UPDATE PROFIL_SISWA SET ID_PENDAFTARAN = ? WHERE ID_SISWA = ?";
    $stmt = $DBH->prepare($sql_update);
    $stmt->execute([$id_daftar_baru, $_SESSION['user_id']]);

    // 4. INSERT JURUSAN (Pakai fungsi dari database.php)
    $id_j1 = getIDJurusan($DBH, $_POST['jurusan-satu']);
    $id_j2 = getIDJurusan($DBH, $_POST['jurusan-dua']);

    if ($id_j1 && $id_j2) {
        $sql_relasi = "INSERT INTO MANAGE_JURUSAN (ID_JURUSAN, ID_PENDAFTARAN) VALUES (?, ?)";
        $stmt = $DBH->prepare($sql_relasi);
        
        // $stmt->execute([$id_j1, $_SESSION['user_id']]);
        // $stmt->execute([$id_j2, $_SESSION['user_id']]);
        $stmt->execute([$id_j1, $id_daftar_baru]);
        $stmt->execute([$id_j2, $id_daftar_baru]);
    } else {
        throw new Exception("Jurusan tidak valid.");
    }

    // tambah jurusan 
    // $sql_jurusan = "SELECT ID_JURUSAN, NAMA_JURUSAN FROM jurusan ORDER BY NAMA_JURUSAN ASC";
    // $stmt_jurusan = $DBH->prepare($sql_jurusan);
    // $stmt_jurusan->execute();
    // $daftar_jurusan = getDaftarJurusan($db);


    $DBH->commit(); 

    // Redirect ke halaman Status
    header("Location: beranda.php");
    exit;

} catch (Exception $e) {
    $DBH->rollBack();
    die("Gagal: " . $e->getMessage());
}
?>