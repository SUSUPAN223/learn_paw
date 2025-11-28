<?php
    include_once 'components/tag_html.php';
    include_once 'components/logo.php';
?>

<div class="container-reg">
    <div class="card-reg">
        <div class="profil">
            <img src="assets/images/profil-black.png" alt="">
        </div>
        <?php 
        $errors = [];
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                require 'database.php';
                validateUsername($errors, $_POST, 'user');
                validateEmail($errors, $_POST, 'email');
                validatePassword($errors, $_POST, 'password');
                cekDuplikasi($errors,$DBH,'PROFIL_SISWA', 'USER_SISWA', $_POST['user'], 'usernames', '*Username sudah terpakai.');
                cekDuplikasi($errors,$DBH,'PROFIL_SISWA', 'EMAIL_SISWA', $_POST['email'], 'emails', '*Email sudah terpakai.');

                if ($errors) {
                    include 'form/form_register.php';
                } else {
                    require 'proses/register_proses.php';
                }
            } else {
                include 'form/form_register.php';
            }
        
         ?>
    </div>
</div>

<?php
    include_once 'components/footer.php';
?>