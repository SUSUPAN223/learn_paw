<?php
session_start();

$email_input = $_POST['email'];     
$pass_input  = $_POST['password'];  

try {
    $stmt = $DBH->prepare("SELECT * FROM ADMIN WHERE EMAIL_ADMIN = ?");
    $stmt->execute([$email_input]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($admin && password_verify($pass_input, $admin['PASS_ADMIN'])) {
        
        session_regenerate_id();
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $admin['ID_ADMIN'];
        $_SESSION['nama']    = $admin['EMAIL_ADMIN'];
        $_SESSION['role']    = 'admin';

        header("Location: admin/beranda_admin.php");
        exit;
    }

    $stmt = $DBH->prepare("SELECT * FROM PROFIL_SISWA WHERE EMAIL_SISWA = ?");
    $stmt->execute([$email_input]);
    $siswa = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($siswa && password_verify($pass_input, $siswa['PASS_SISWA'])) {
        
        session_regenerate_id();
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $siswa['ID_SISWA'];
        $_SESSION['nama']    = $siswa['NAMA_LENGKAP']; 
        $_SESSION['role']    = 'siswa';

        header("Location: beranda.php"); 
        exit;
    }

    header("Location: login.php?error=gagal");
    exit;
    
} catch (PDOException $e) {
    die("Error database: " . $e->getMessage());
}
?>