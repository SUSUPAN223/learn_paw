<?php
    // Merubah format tanggal dari database
    $tgl_value = '';
    if (!empty($_POST['tgl_lahir'])) {
        $tgl_value = $_POST['tgl_lahir'];
    } elseif (!empty($data_siswa['TANGGAL_LAHIR'])) {
        $tgl_value = date('d-m-Y', strtotime($data_siswa['TANGGAL_LAHIR']));
    }

    $current_need = $_POST['nama_kebutuhan'] ?? $data_kebutuhan_aktif['NAMA_KEBUTUHAN'] ?? ''; 
?>

<form action="" class="profil-siswa" method="POST" enctype="multipart/form-data">

	<div class="data-profil">
		<label for="nama_lengkap">Nama Lengkap *</label>
		<input type="text" name="nama_lengkap" id="nama_lengkap" value="<?php echo htmlspecialchars($_POST['nama_lengkap'] ?? $data_siswa['NAMA_LENGKAP'] ?? ''); ?>">
		<?php 
        if (isset($errors['nama_lengkap'])) {
            echo "<span class='erorr'>{$errors['nama_lengkap']}</span>";
        }
        ?>
	</div>

	<div class="username">
        <label for="user">Username</label>
        <span class="value" ><?php echo htmlspecialchars($data_siswa['USER_SISWA'] ?? ''); ?></span>
    </div> 

	<div class="email">
        <label for="email">Email yang digunakan</label>
        <span class="value"><?php echo htmlspecialchars($data_siswa['EMAIL_SISWA'] ?? ''); ?></span>
    </div>

	<div class="data-profil">
		<label for="tempat_lahir">Tempat Lahir *</label>
		<input type="text" name="tempat_lahir" id="tempat_lahir" value="<?php echo htmlspecialchars($_POST['tempat_lahir'] ?? $data_siswa['TEMPAT_LAHIR'] ?? ''); ?>">
		<?php 
        if (isset($errors['tempat_lahir'])) {
            echo "<span class='erorr'>{$errors['tempat_lahir']}</span>";
        }
        ?>
	</div>

	<div class="data-profil">
		<label for="tgl_lahir">Tanggal Lahir (dd-mm-yyyy) *</label>
		<input type="text" name="tgl_lahir" id="tgl_lahir" placeholder="dd-mm-yyyy" value="<?php echo htmlspecialchars($_POST['tgl_lahir'] ?? $tgl_value ?? ''); ?>">
		<?php 
        if (isset($errors['tgl_lahir'])) {
            echo "<span class='erorr'>{$errors['tgl_lahir']}</span>";
        }
        ?>
	</div>

	<div class="data-profil">
		<label>Jenis Kelamin *</label>
		<div class="radio-group">
			<input type="radio" id="laki_laki" name="jenis_kelamin" value="Laki-laki" <?php 
                       if (($_POST['jenis_kelamin'] ?? $data_siswa['JENIS_KELAMIN'] ?? '') == 'Laki-laki') {
                           echo 'checked';
                       }
                   ?>>
			<label for="laki_laki">Laki-laki</label>

			<input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan"<?php 
                       if (($_POST['jenis_kelamin'] ?? $data_siswa['JENIS_KELAMIN'] ?? '') == 'Perempuan') {
                           echo 'checked';
                       }
                   ?>>
			<label for="perempuan">Perempuan</label>
		</div>
		<?php 
        if (isset($errors['jenis_kelamin'])) {
            echo "<span class='erorr'>{$errors['jenis_kelamin']}</span>";
        }
        ?>
	</div>

	<div class="data-profil">
		<label for="alamat">Alamat *</label>
		<textarea name="alamat" id="alamat" rows="4"><?php echo htmlspecialchars($_POST['alamat'] ?? $data_siswa['ALAMAT'] ?? ''); ?></textarea>
		<?php 
        if (isset($errors['alamat'])) {
            echo "<span class='erorr'>{$errors['alamat']}</span>";
        }
        ?>
	</div>

	<div class="data-profil">
		<label for="asal_sekolah">Asal Sekolah *</label>
		<input type="text" name="asal_sekolah" id="asal_sekolah" value="<?php echo htmlspecialchars($_POST['asal_sekolah'] ?? $data_siswa['ASAL_SEKOLAH'] ?? ''); ?>">
		<?php 
        if (isset($errors['asal_sekolah'])) {
            echo "<span class='erorr'>{$errors['asal_sekolah']}</span>";
        }
        ?>
	</div>

<hr>
    <h4>Data Wali</h4>

    <div class="data-profil">
        <label>Nama Wali *</label>
        <input type="text" name="nama_wali" 
               value="<?php echo htmlspecialchars($_POST['nama_wali'] ?? $data_siswa['NAMA_WALI'] ?? ''); ?>">
        <?php 
        if (isset($errors['nama_wali'])) {
            echo "<span class='erorr'>{$errors['nama_wali']}</span>";
        }
        ?>
    </div>

    <div class="data-profil">
        <label>Status Hubungan *</label>
        <select name="status_wali" >
            <option value="">-- Pilih --</option>
            <option value="Ayah" <?php if(($_POST['status_wali'] ?? $data_siswa['STATUS_WALI'] ?? '') == 'Ayah') echo 'selected'; ?>>Ayah Kandung</option>
            <option value="Ibu" <?php if(($_POST['status_wali'] ?? $data_siswa['STATUS_WALI'] ?? '') == 'Ibu') echo 'selected'; ?>>Ibu Kandung</option>
            <option value="Wali" <?php if(($_POST['status_wali'] ?? $data_siswa['STATUS_WALI'] ?? '') == 'Wali') echo 'selected'; ?>>Wali/Kerabat</option>
        </select>
        <?php 
        if (isset($errors['status_wali'])) {
            echo "<span class='erorr'>{$errors['status_wali']}</span>";
        }
        ?>
    </div>

    <div class="data-profil">
        <label>Nomor Telepon Wali (HP) *</label>
        <input type="text" name="nomor_telpon" 
               value="<?php echo htmlspecialchars($_POST['nomor_telpon'] ?? $data_siswa['TELP_WALI'] ?? ''); ?>">
        <?php 
        if (isset($errors['nomor_telpon'])) {
            echo "<span class='erorr'>{$errors['nomor_telpon']}</span>";
        }
        ?>
    </div>
<hr>
	<div class="data-profil">
    <label for="jenis_kebutuhan">-- Pilih Kebutuhan Khusus --</label>
    
    <select name="nama_kebutuhan" id="jenis_kebutuhan">
        
        <option value="">---Pilih Kebutuhan---</option>

        <?php
        foreach ($kebutuhan_list as $kebutuhan) {
            $nama_kebutuhan = htmlspecialchars($kebutuhan['NAMA_KEBUTUHAN']);
            $selected = ($current_need == $nama_kebutuhan) ? 'selected' : '';
            
            // Mencetak opsi dari database
            echo "<option value=\"{$nama_kebutuhan}\" {$selected}>{$nama_kebutuhan}</option>";
        }
        ?>
    </select>
    <?php
    // Kunci Error sekarang harus MENCARI 'nama_kebutuhan' (Sesuai Input Name)
    if (isset($errors['nama_kebutuhan'])) { 
        echo "<span class='erorr'>{$errors['nama_kebutuhan']}</span>";
    }
    ?>
</div>


<div class="data-profil">
    <label for="deskripsi_kebutuhan">Deskripsi Kebutuhan Khusus</label>
    <textarea name="deskripsi_kebutuhan" id="deskripsi_kebutuhan" rows="4" ><?php echo htmlspecialchars($_POST['deskripsi_kebutuhan'] ?? $data_kebutuhan_aktif['DESKRIPSI_SISWA_KHUSUS'] ?? ' ') ?></textarea>
    <?php
    if (isset($errors['deskripsi_kebutuhan'])) {
        echo "<span class='erorr'>{$errors['deskripsi_kebutuhan']}</span>";
    }
    ?>
</div>

<!-- 	<div class="form-group">
		<label for="foto_profil">Masukkan Foto Profil * <br> Background Merah = tahun ganjil, biru = genap</label>
		<input type="file" name="foto_profil" id="foto_profil" accept="image/*" class="file-input">
		//<?php 
        //if (isset($errors['foto_profil'])) {
           //echo "<span class='erorr'>{$errors['foto_profil']}</span>";
        //}
        //?>
	</div> -->

	<div class="button">
		<button type="submit" class="btn-submit">Submit</button>
	</div>
</form>