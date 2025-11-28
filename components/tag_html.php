<?php 
    $url_css = 'assets/css/style.css'; 

    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {

        $url_css = '../assets/css/style.css';
    } 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAW</title>
    <link rel="stylesheet" href="<?php echo $url_css ?>">
</head>
<body>