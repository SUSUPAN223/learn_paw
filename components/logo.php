<?php 
    $url_logo = 'assets/images/logo.png';
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {

        $url_logo = '../assets/images/logo.png';
    } 
 ?>

<div class="header-logo">
    <div class="img">
        <img src="<?php echo $url_logo ?>" alt="">
    </div>

    <div class="text-logo">
        <h1 class="inklusi">PPDB INKLUSI</h1>
        <p class="nirwana">SEKOLAH NIRWANA</p>
    </div>
</div>