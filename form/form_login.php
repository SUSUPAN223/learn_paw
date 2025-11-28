<form action="" class="login" method="post">
    <div class="data-log">
        <label for="email">Email *</label>
        <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>">
        <?php 
        if (isset($errors['email'])) {
            echo "<span class='erorr'>{$errors['email']}</span>";
        }
        ?>
    </div>

    <div class="data-log">
        <label for="password">Password *</label>
        <input type="password" name="password" id="password">
        <?php
        if (isset($errors['password'])) {
            echo "<span class='erorr'>{$errors['password']}</span>";
        } elseif (isset($errors['login'])) {
                echo "<span class='erorr'>{$errors['login']}</span>";
            }
            ?>
    </div>

<!--VERSI REFISI  -->
<div class="button">
    <button class="btn-login" type="submit">Login</button><br>
</div>
    <a href="register.php" class="register">Belum Punya Akun?</a>
</form>