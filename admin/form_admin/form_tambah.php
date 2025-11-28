    <div class="tambah-jurusan">    
        <div class="judul-jurusan">
            <h3>Tambah Jurusan</h3>
        </div>
        <form action="" class="admin" method="post">
            <div class="masukan-jurusan">
                <label for="masukan-jurusan">Masukkan Jurusan</label>
                <input type="text" name="masukan-jurusan" id="masukan-jurusan" value="<?php echo htmlspecialchars($_POST['masukan-jurusan'] ?? ''); ?>">
            </div>    
            <?php 
            if (isset($errors['masukan-jurusan'])) {
                echo "<p class='erorr'>{$errors['masukan-jurusan']}</p>";
            }
            ?>

            <div class="desk-jurusan">
                <label for="desk-jurusan">Deskripsi Jurusan</label>
                <input type="text" name="desk-jurusan" id="desk-jurusan" value="<?php echo htmlspecialchars(trim($_POST['desk-jurusan'] ?? '')); ?>">
            </div>
            <?php 
            if (isset($errors['desk-jurusan'])) {
                echo "<p class='erorr'>{$errors['desk-jurusan']}</p>";
            } elseif (isset($errors['jurusans'])) {
                echo "<span class='erorr'>{$errors['jurusans']}</span>";
            }
            ?>

            <div class="button-jurusan">
                <button class="btn-jurusan">Tambah Jurusan</button>
            </div>

        </form>
    </div>
