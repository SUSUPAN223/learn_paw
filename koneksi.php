 <?php
// --- Tambahkan 2 baris ini sementara untuk melihat errornya ---
ini_set('display_errors', 1);
error_reporting(E_ALL);
// -------------------------------------------------------------

$host = 'localhost';
// ... kodingan koneksi Anda ...
$db_host = 'localhost';
$db_name = 'ppdb';
$db_user = 'root';
$db_pass = '';
$db_charset = 'utf8mb4';

$dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset";


$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {

     $DBH = new PDO($dsn, $db_user, $db_pass, $options);
     // echo "Koneksi berhasill";

} catch (PDOException $e) {
     die("Koneksi ke database gagal: " . $e->getMessage());
}
?>