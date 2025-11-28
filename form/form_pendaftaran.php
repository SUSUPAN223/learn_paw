

<form action="" class="pendaftaran" method="POST" enctype="multipart/form-data">
    <div class="data-reg">
        <label for="user">Nama Lengkap</label>
        <span class="value" ><?php echo htmlspecialchars($data_siswa['NAMA_LENGKAP'] ?? ''); ?></span>
    </div>    

    <div class="data-reg">
        <label for="email">Email yang digunakan</label>
        <span class="value"><?php echo htmlspecialchars($data_siswa['EMAIL_SISWA'] ?? ''); ?></span>
    </div>

    <div class="data-reg">
        <label for="jurusan-satu">Pilihan Satu *</label>
        <select name="jurusan-satu" id="">
            <option value="">-- Pilih Jurusan --</option>
            <?php foreach ($daftar_jurusan as $jurusan): ?>
                <option value="<?= htmlspecialchars($jurusan['NAMA_JURUSAN']); ?>" <?= (($_POST['jurusan-satu'] ?? '') == $jurusan['NAMA_JURUSAN']) ? 'selected' : ''; ?> >
                    <?= htmlspecialchars($jurusan['NAMA_JURUSAN']); ?>
                </option>

                <?php endforeach; ?>
        </select>
        <?php 
        if (isset($errors['jurusan-satu'])) {
            echo "<p class='erorr'>{$errors['jurusan-satu']}</p>";
        }
        ?>
    </div>

    <div class="data-reg">
        <label for="jurusan-dua">Pilihan Kedua *</label>
        <select name="jurusan-dua" >
            <option value="">-- Pilih Jurusan --</option>
            <?php foreach ($daftar_jurusan as $jurusan): ?>
                <option value="<?= htmlspecialchars($jurusan['NAMA_JURUSAN']); ?>" <?= (($_POST['jurusan-dua'] ?? '') == $jurusan['NAMA_JURUSAN']) ? 'selected' : ''; ?> >
                    <?= htmlspecialchars($jurusan['NAMA_JURUSAN']); ?>
                </option>

                <?php endforeach; ?>
        </select>
        <?php 
        if (isset($errors['jurusan-dua'])) {
            echo "<p class='erorr'>{$errors['jurusan-dua']}</p>";
        }
        ?>
    </div>
 
<div class="data-reg">
        <label for="file_ijazah">Masukkan Ijazah (Jpg/Jpeg) *</label>
        
        <input type="file" name="file_ijazah" id="file_ijazah" accept="application/pdf, image/jpeg, image/jpg">
        
        <?php if (isset($errors['file_ijazah'])) : ?>
            <p class="erorr"><?php echo $errors['file_ijazah']; ?></p>
        <?php endif; ?>
    </div>

    <div class="button">
        <button class="btn-daftar">Submit</button>
    </div>
    <p class="erorr">*Pastikan data anda sudah valid, karna setelah submit data tidak bisa di edit</p>

</form>