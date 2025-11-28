    <div class="tambah-jurusan">    
        <div class="judul-jurusan">
            <h3>Edit Kebutuhan</h3>
        </div>
        <form action="" class="admin" method="post">
            <div class="masukan-jurusan">
                <label for="nama-kebutuhan">Nama Kebutuhan</label>
                <input type="text" name="nama-kebutuhan" id="masukan-jurusan" value="<?php echo htmlspecialchars($_POST['nama-kebutuhan'] ?? $data_edit_kebutuhan['NAMA_KEBUTUHAN'] ?? ''); ?>">
            </div>    
            <?php 
            if (isset($errors['nama-kebutuhan'])) {
                echo "<p class='erorr'>{$errors['nama-kebutuhan']}</p>";
            }
            ?>

            <div class="desk-jurusan">
                <label for="desk-kebutuhan">Deskripsi Kebutuhan</label>
                <input type="text" name="desk-kebutuhan" id="desk-jurusan" value="<?php echo htmlspecialchars(trim($_POST['desk-kebutuhan'] ?? $data_edit_kebutuhan['DESKRIPSI_KEBUTUHAN'] ?? '')); ?>">
            </div>
            <?php 
            if (isset($errors['desk-kebutuhan'])) {
                echo "<p class='erorr'>{$errors['desk-kebutuhan']}</p>";
            } elseif (isset($errors['kebutuhanss'])) {
                echo "<span class='erorr'>{$errors['kebutuhanss']}</span>";
            }
            ?>

            <div class="button-jurusan">
                <button type="submit"class="btn-jurusan">Edit Kebutuhan</button>
            </div>

        </form>
    </div>
