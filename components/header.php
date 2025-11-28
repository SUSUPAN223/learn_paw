<?php require_once 'script.php'; ?>

<header class="site-header">

    <?php include_once 'logo.php'; ?>

    <div class="header_2">
        <ul>
            <li><a href="<?php echo $url_beranda ?>">Beranda</a></li>
            <li><a href="<?php echo $url_profil ?>">Profil</a></li>
            <li><a href="<?php echo $url_pendaftaran ?>">Pendaftaran</a></li>
            <li><a href="status.php">Status</a></li>
        </ul>
    </div>

    <?php require 'logout.php' ?>

</header>