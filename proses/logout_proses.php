<?php
session_start();

$_SESSION = array();

session_destroy();

header("Location: ../index.php?status=logout_sukses");
exit; // Pastikan skrip berhenti di sini

?>