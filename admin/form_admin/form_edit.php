    <div class="tambah-jurusan">
        <div class="judul-jurusan">
            <h3>EDIT JURUSAN</h3>
        </div>
        <form action="" class="admin" method="post">
            <div class="masukan-jurusan">
                <label for="masukan-jurusan">Nama Jurusan</label>
                <input type="text" name="masukan-jurusan" id="masukan-jurusan" 
                value="<?php echo htmlspecialchars(trim($_POST['masukan-jurusan'] ?? $data_edit['NAMA_JURUSAN'] ?? '')); ?>"><br>
            </div>    
            <?php 
                if (isset($errors['masukan-jurusan'])) {
                    echo "<p class='erorr'>{$errors['masukan-jurusan']}</p>";
                }
                ?>

            <div class="desk-jurusan">
                <label for="desk-jurusan">Deskripsi Jurusan</label>
                <input type="text" name="desk-jurusan" id="desk-jurusan" 
                value="<?php echo htmlspecialchars(trim($_POST['desk-jurusan'] ?? $data_edit['DESKRIPSI_JURUSAN'] ?? '')); ?>"><br>
                
            </div>
            <?php 
                if (isset($errors['desk-jurusan'])) {
                    echo "<p class='erorr'>{$errors['desk-jurusan']}</p>";
                }
                ?>

            <div class="button-jurusan">
                <button class="btn-jurusan" type="submit">Edit Jurusan</button>
            </div>

        </form>
    </div>