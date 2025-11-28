<form action="" class="login" method="post">
    <div class="username">
        <label for="user">Username *</label>
        <input type="text" name="user" id="user" value="<?php echo htmlspecialchars($_POST['user'] ?? '') ?>">
        <?php
        if (isset($errors['user'])) {
            echo "<span class='erorr'>{$errors['user']}</span>";
        } elseif (isset($errors['usernames'])) {
            echo "<span class='erorr'>{$errors['usernames']}</span>";
        }
    ?>
</div>    

<div class="email">
    <label for="email">Email *</label>
    <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>">
    <?php
    if (isset($errors['email'])) {
        echo "<span class='erorr'>{$errors['email']}</span>";
    } elseif (isset($errors['emails'])) {
            echo "<span class='erorr'>{$errors['emails']}</span>";
    }
?>
</div>

<div class="pass">
    <label for="password">Password *</label>
    <input type="password" name="password" id="password">
    <?php
    if (isset($errors['password'])) {
        echo "<span class='erorr'>{$errors['password']}</span>";
    }
?>
</div>


<!--VERSI REFISI  -->
<div class="button">
    <button class="btn-reg" type="submit">Register</button><br>
</div>
<a href="index.php" class="register">Sudah Punya Akun?</a>
</form>