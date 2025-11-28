    <div class="tambah-jurusan">    
        <div class="judul-jurusan">
            <h3>Tambah Kebutuhan</h3>
        </div>
        <form action="" class="admin" method="post">
            <div class="masukan-jurusan">
                <label for="nama-kebutuhan">Nama Kebutuhan</label>
                <input type="text" name="nama-kebutuhan" id="masukan-jurusan" value="<?php echo htmlspecialchars($_POST['nama-kebutuhan'] ?? ''); ?>">
            </div>    
            <?php 
            if (isset($errors['nama-kebutuhan'])) {
                echo "<p class='erorr'>{$errors['nama-kebutuhan']}</p>";
            }
            ?>

            <div class="desk-jurusan">
                <label for="desk-kebutuhan">Deskripsi Kebutuhan</label>
                <input type="text" name="desk-kebutuhan" id="desk-jurusan" value="<?php echo htmlspecialchars(trim($_POST['desk-kebutuhan'] ?? '')); ?>">
            </div>
            <?php 
            if (isset($errors['desk-kebutuhan'])) {
                echo "<p class='erorr'>{$errors['desk-kebutuhan']}</p>";
            } elseif (isset($errors['kebutuhans'])) {
                echo "<span class='erorr'>{$errors['kebutuhans']}</span>";
            }
            ?>

            <div class="button-jurusan">
                <button class="btn-jurusan">Tambah Kebutuhan</button>
            </div>

        </form>
    </div>
