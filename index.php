<?php
include_once 'components/tag_html.php';
include_once 'components/logo.php';
?>


<div class="konten-log">
    <div class="container-log">
        <div class="card-log">
            <div class="profil">
                <img src="assets/images/profil-black.png" alt="">
            </div>
            <?php 
            $errors = [];
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                require 'database.php';
                validateEmail($errors, $_POST, 'email');
                validatePassword($errors, $_POST, 'password');
                cekLogin($errors, $DBH, $_POST['email'], $_POST['password']);

                if ($errors) {
                    include 'form/form_login.php';
                } else {
                    require 'proses/login_proses.php';
                }
            } else {
                include 'form/form_login.php';
            }
            ?>
        </div>
    </div>
    <div class="foto_school-log">
        <img src="assets/images/bg_sekolah_1.png" alt="">
    </div>
</div>

<?php
include_once 'components/footer.php';
?>
