<?php 

require_once 'koneksi.php';

function validateName(&$errors, $field_List, $field_name) {
	$pattern = "/^[ a-zA-Z'-]{6,}$/";
	if (empty(trim($field_List[$field_name] ?? ''))) {
		$errors[$field_name] = '*Tidak Boleh Kosong';
	} elseif (!preg_match($pattern, $field_List[$field_name])) {
		$errors[$field_name] = 'Masukkan nama dengan benar';
	}
}

function validateTempatLahir(&$errors,$field_List,$field_name) {
	$pattern = "/^[ a-zA-Z'-]+$/";
	if(empty(trim($field_List[$field_name] ?? ''))) {
		$errors[$field_name] = '*Tidak Boleh Kosong';
	} elseif (!preg_match($pattern, $field_List[$field_name])) {
		$errors[$field_name] = 'Input tidak benar';
	} elseif (strlen($field_List[$field_name]) > 60) {
        $errors[$field_name] = 'Text terlalu panjang';
    }
}

function validateAlamat(&$errors, $field_List, $field_name) {
	$pattern = "/^[ a-zA-Z',.0-9-\/]+$/";
	if (empty(trim($field_List[$field_name] ?? ''))) {
		$errors[$field_name] = '*Alamat tidak boleh kosong';
	} elseif (!preg_match($pattern, $field_List[$field_name])) {
		$errors[$field_name] = '*Isi Alamat Dengan Benar';
	} elseif (strlen($field_List[$field_name]) < 15 ) {
		$errors[$field_name] = '*Masukkan Alamat dengan lengkap';
	}
}

function validateTanggalLahir(&$errors, $field_List, $field_name) {

	$input_tanggal = $field_List[$field_name];
	$pattern = "/^\d{2}-\d{2}-\d{4}$/";
    if (empty(trim($field_List[$field_name] ?? ''))) {
        $errors[$field_name] = '*Tanggal Lahir wajib diisi';
    } elseif (!preg_match($pattern, $input_tanggal)) {
        $errors[$field_name] = '*Format salah. Gunakan format: dd-mm-yyyy';
    } else {

    $pecah = explode('-', $input_tanggal); //pecah string jadi array
    $hari  = (int)$pecah[0]; //nyimpan hari
    $bulan = (int)$pecah[1]; //nyimpan bulan
    $tahun = (int)$pecah[2];

  	
    if (!checkdate($bulan, $hari, $tahun)) {
        $errors[$field_name] = '*Tanggal tidak valid (Cek kembali tanggal/bulan)';
    }
    }
}

function validateJenisKelamin(&$errors, $field_List, $field_name) {
    $opsi_valid = ['Laki-laki', 'Perempuan'];

    if (empty(trim($field_List[$field_name] ?? ''))) {
        $errors[$field_name] = '*Jenis Kelamin wajib dipilih';
    } elseif (!in_array($field_List[$field_name], $opsi_valid)) {
        $errors[$field_name] = '*Pilihan tidak valid';
    }
}
function validateEmail(&$errors, $field_List, $field_name) {
	if(empty(trim($field_List[$field_name] ?? ''))) {
		$errors[$field_name] = '*Tidak Boleh Kosong';
	} elseif (!filter_var($field_List[$field_name], FILTER_VALIDATE_EMAIL)) {
		$errors[$field_name] = 'format email invalid';
	}
}

function validateUsername(&$errors, $field_List, $field_name) {
	$pattern = "/^[a-zA-Z0-9]{3,}$/";
	if (empty(trim($field_List[$field_name] ?? ''))) {
		$errors[$field_name] = '*Tidak Boleh Kosong';
	} elseif (!preg_match($pattern, $field_List[$field_name])) {
		$errors[$field_name] = 'username tidak valid (min.3)';
	}
}

function validatePassword(&$errors, $field_List, $field_name) {
	$pattern = "/^[a-zA-Z0-9]{8,}$/";
	if (empty(trim($field_List[$field_name] ?? ''))) {
		$errors[$field_name] = '*Tidak Boleh Kosong';
	} elseif (!preg_match($pattern, $field_List[$field_name])) {
		$errors[$field_name] = 'min.8 karakter, hanya boleh huruf dan angka';
	}
}

function validateRePassword(&$errors, $field_List, $field_name, $field_check) {
	if (empty(trim($field_List[$field_name] ?? ''))) {
		$errors[$field_name] = '*Tidak Boleh Kosong';
	} elseif ($field_List[$field_name] != $field_List[$field_check]) {
		$errors[$field_name] = '*Tidak sesuai dengan Password';
	} 

}

function validateJurusan(&$errors,$field_List, $field_name) {
   $pattern = "/^[ a-zA-Z0-9]+$/";
    if (empty(trim($field_List[$field_name] ?? ''))) {
        $errors[$field_name] = '*Tidak Boleh Kosong';
    } elseif (!preg_match($pattern, $field_List[$field_name])) {
        $errors[$field_name] = '*input mengandung karakter tidak valid';
    } 
}

function validateAsalsekolah (&$errors,$field_List,$field_name){
	$pattern = "/^[ a-zA-Z0-9\-.']{8,}$/";
	if (empty(trim($field_List[$field_name] ?? ''))) {
		$errors[$field_name] = '*Tidak Boleh Kosong';
	} elseif (!preg_match($pattern, $field_List[$field_name])) {
		$errors[$field_name] = '*min.8 karakter, input tidak valid';
	}
}

function validateNomortelpon(&$errors,$field_List,$field_name) {
	$pattern = "/^[0-9]+$/";
	if (empty(trim($field_List[$field_name] ?? ''))) {
		$errors[$field_name] = '*Tidak Boleh Kosong';
	} elseif (!preg_match($pattern, $field_List[$field_name])) {
		$errors[$field_name] = 'hanya boleh angka';
	} elseif (strlen($field_List[$field_name]) < 8 || strlen($field_List[$field_name]) > 14 ) {
		$errors[$field_name] = '*Nomor Min.8 angka, Max.14 angka';
	}
}

function validateJurusanSatu(&$errors,$field_List,$field_name, $daftar_jurusan) {
	$daftar = [];
    foreach ($daftar_jurusan as $jurusan) {
        $daftar[] = $jurusan['NAMA_JURUSAN'];
    }
	if (empty(trim($field_List[$field_name] ?? ''))) {
        $errors[$field_name] = '*Wajib Memilih Jurusan';
    } elseif (!in_array($field_List[$field_name], $daftar)) {
        $errors[$field_name] = '*Pilihan tidak valid (Jangan ubah value HTML)';
    }
}

function validateJurusanDua(&$errors,$field_List,$field_name,$jurusanSatu, $daftar_jurusan) {
    $daftar = [];
    foreach ($daftar_jurusan as $jurusan) {
        $daftar[] = $jurusan['NAMA_JURUSAN'];
    }
	if (empty(trim($field_List[$field_name] ?? ''))) {
        $errors[$field_name] = '*Wajib Memilih Jurusan Kedua';
    } elseif (!in_array($field_List[$field_name], $daftar)) {
        $errors[$field_name] = '*Pilihan tidak valid (Jangan ubah value HTML)';
    } elseif ($field_List[$field_name] == $field_List[$jurusanSatu]) {
    	$errors[$field_name] = '*Harus Memilih Jurusan Yang Berbeda Dari Jurusan Satu';
    }
} 

function validateStatusWali(&$errors,$field_List,$field_name) {
	$opsi_valid = [
		'Ayah',
		'Ibu',
		'Wali'
	];
	if (empty(trim($field_List[$field_name] ?? ''))) {
        $errors[$field_name] = '*Wajib Memiliki Wali';
    
    } elseif (!in_array($field_List[$field_name], $opsi_valid)) {
        $errors[$field_name] = '*Pilihan tidak valid (Jangan ubah value HTML)';
    }

}


function validateJenisKebutuhan(&$errors, $field_List, $field_name,$kebutuhan_list) {
    $list = [];
    foreach ($kebutuhan_list as $key) {
        $list[] = $key['NAMA_KEBUTUHAN'];
    }
    if (empty(trim($field_List[$field_name] ?? ''))) {
        $errors[$field_name] = '*Kebutuhan Khusus wajib dipilih';
    
    } elseif (!in_array($field_List[$field_name], $list)) {
        $errors[$field_name] = '*Pilihan tidak valid (Jangan ubah value HTML)';
    }
}

function validateTahun(&$errors, $field_List, $field_name) {
	$pattern = date('Y') - 20;
	if (empty(trim($field_List[$field_name] ?? ''))) {
		$errors[$field_name] = '*Tidak Boleh Kosong';
	} elseif ($field_List[$field_name] >= $pattern) {
		$errors[$field_name] = '*Anda belum 20 tahun';
	}
}

function validateFoto(&$errors, $file_List, $field_name) {
    $file = $file_List[$field_name] ?? null;
    if (!$file || $file['error'] == 4) {
        $errors[$field_name] = '*Foto profil wajib diupload';
        return;
    }

    if ($file['error'] != 0) {
        $errors[$field_name] = '*Terjadi kesalahan saat upload foto';
        return;
    }

    $maxSize = 2 * 1024 * 1024; 
    if ($file['size'] > $maxSize) {
        $errors[$field_name] = '*Ukuran foto terlalu besar (Max 2MB)';
        return;
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png'];

    if (!in_array($ext, $allowed)) {
        $errors[$field_name] = '*Format salah. Hanya boleh JPG, JPEG, atau PNG';
    }
}

function validateIjazah(&$errors, $file_List, $field_name) {
    $file = $file_List[$field_name] ?? null;

    if (!$file || $file['error'] == 4) {
        $errors[$field_name] = '*Berkas Ijazah wajib diupload';
        return;
    }

    if ($file['error'] != 0) {
        $errors[$field_name] = '*Gagal mengupload file (Cek koneksi atau ukuran file)';
        return;
    }


    $maxSize = 2 * 1024 * 1024; 
    if ($file['size'] > $maxSize) {
        $errors[$field_name] = '*Ukuran file terlalu besar (Maksimal 2MB)';
        return;
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'pdf'];

    if (!in_array($ext, $allowed)) {
        $errors[$field_name] = '*Format salah. Hanya boleh file JPG JPEG, atau PDF';
    }
}

function validateDeskripsiwajib(&$errors, $field_List, $field_name) {

    if (empty($field_List[$field_name])){
        return;
    }
    $pattern = "/^[ a-zA-Z0-9\.\,\-\']+$/";
    if (!preg_match($pattern, $field_List[$field_name])) {
        $errors[$field_name] = '*Mengandung karakter abnormal (Hanya huruf, angka, titik, koma, spasi)';
    }
}

function validateDeskripsi(&$errors, $field_List, $field_name) {

    if (empty($field_List[$field_name])){
        return;
    }
    $pattern = "/^[ a-zA-Z0-9\.\,\-\']+$/";
    if (!preg_match($pattern, $field_List[$field_name])) {
        $errors[$field_name] = '*Mengandung karakter abnormal (Hanya huruf, angka, titik, koma, spasi)';
    }
}

function cekDuplikasi(&$errors, $db, $table, $kolom, $data, $keyError, $pesan) {
	if (isset($errors[$keyError])){
		return;
	}

	$stmnt = $db->prepare("SELECT $kolom FROM $table WHERE $kolom = ?");
	$stmnt->execute([
		$data
	]);

	if ($stmnt->rowCount() > 0) {
		$errors[$keyError] = $pesan;
	} 
}

/**
 * Fungsi Login Multi-User (Admin & Siswa)
 */
function cekLogin(&$errors, $db, $email, $passwordInput) {
    $stmt = $db->prepare("SELECT * FROM ADMIN WHERE EMAIL_ADMIN = ?");
    $stmt->execute([$email]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        if (password_verify($passwordInput, $admin['PASS_ADMIN'])) {
            $admin['ROLE'] = 'admin'; 
            return $admin; 
        }
    }


    $stmt = $db->prepare("SELECT * FROM PROFIL_SISWA WHERE EMAIL_SISWA = ?");
    $stmt->execute([$email]);
    $siswa = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($siswa) {
        if (password_verify($passwordInput, $siswa['PASS_SISWA'])) {
            $siswa['ROLE'] = 'siswa';
            return $siswa; 
        }
    }

    $errors['login'] = "Email atau Password salah!";
    return false;
}

function getSiswaById($db, $id_siswa) {
$sql = "SELECT p.*, w.NAMA_WALI, w.STATUS_WALI, w.NO_TELP AS TELP_WALI, 
               d.STATUS_PENDAFTARAN, d.TANGGAL_DAFTAR,
               
               -- Tambahan Kebutuhan Khusus
               skk.NAMA_KEBUTUHAN,
               k.DESKRIPSI_SISWA_KHUSUS
               
        FROM PROFIL_SISWA p
        LEFT JOIN WALI_SISWA w ON p.ID_WALI = w.ID_WALI
        LEFT JOIN PENDAFTARAN d ON p.ID_PENDAFTARAN = d.ID_PENDAFTARAN
        
        -- Kebutuhan Khusus ditambahkan di sini
        LEFT JOIN KEBUTUHAN k ON p.ID_SISWA = k.ID_SISWA
        LEFT JOIN SISWA_KEBUTUHAN_KHUSUS skk ON k.ID_SISWA_KEBUTUHAN = skk.ID_SISWA_KEBUTUHAN
        
        WHERE p.ID_SISWA = ?";
            
    $stmt = $db->prepare($sql);
    $stmt->execute([$id_siswa]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function simpanDataWali($db, $id_siswa, $nama_wali, $status_wali, $no_telp) {
    $stmt = $db->prepare("SELECT ID_WALI FROM PROFIL_SISWA WHERE ID_SISWA = ?");
    $stmt->execute([$id_siswa]);
    $curr_wali = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($curr_wali['ID_WALI']) {
        $sql = "UPDATE WALI_SISWA SET NAMA_WALI=?, STATUS_WALI=?, NO_TELP=? WHERE ID_WALI=?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$nama_wali, $status_wali, $no_telp, $curr_wali['ID_WALI']]);
        
        return $curr_wali['ID_WALI'];

    } else {
        $sql_check = "SELECT ID_WALI FROM WALI_SISWA WHERE NAMA_WALI = ? AND NO_TELP = ?";
        $stmt_check = $db->prepare($sql_check);
        $stmt_check->execute([$nama_wali, $no_telp]);
        $existing_id = $stmt_check->fetchColumn(); 
        
        if ($existing_id) {
            $sql_link = "UPDATE PROFIL_SISWA SET ID_WALI = ? WHERE ID_SISWA = ?";
            $db->prepare($sql_link)->execute([$existing_id, $id_siswa]);
            return $existing_id;

        } else {
            $sql_insert = "INSERT INTO WALI_SISWA (NAMA_WALI, STATUS_WALI, NO_TELP) VALUES (?, ?, ?)";
            $db->prepare($sql_insert)->execute([$nama_wali, $status_wali, $no_telp]);
            
            $new_id = $db->lastInsertId();
            $sql_link = "UPDATE PROFIL_SISWA SET ID_WALI = ? WHERE ID_SISWA = ?";
            $db->prepare($sql_link)->execute([$new_id, $id_siswa]);
            return $new_id;
        }
    }
}

function cekStatusKunci($data_siswa_array) {
    // Hapus parameter $db dan $id_siswa
    
    // Langsung cek kunci array ID_PENDAFTARAN
    if ($data_siswa_array && !empty($data_siswa_array['ID_PENDAFTARAN'])) {
        return true; 
    }
    return false;
}


function cekKelengkapanProfil($db, $id_siswa) {
    // Ambil data siswa lengkap (memakai getSiswaById yang sudah diJOIN dengan Wali)
    $data = getSiswaById($db, $id_siswa);

    if (!$data) return false; // Siswa tidak ditemukan

    // DAFTAR KOLOM WAJIB
    $wajib = [
        'NAMA_LENGKAP',
        'TEMPAT_LAHIR',
        'TANGGAL_LAHIR',
        'JENIS_KELAMIN',
        'ALAMAT',
        'ASAL_SEKOLAH',
        'NAMA_WALI',    // Dari Wali via JOIN
        'STATUS_WALI',  // Dari Wali via JOIN
        'TELP_WALI',    // Dari Wali via JOIN
        'NAMA_KEBUTUHAN' // Status Kebutuhan (Diisi 'Tidak Ada' atau jenis kebutuhan)
    ];

    foreach ($wajib as $kolom) {
        // Cek apakah kolom tersebut NULL atau string kosong setelah trim
        if (empty(trim($data[$kolom] ?? ''))) {
            return false; // Ditemukan kolom kosong, TOLAK.
        }
    }

    return true; // Semua kolom wajib terisi
}

function getIDJurusan($db, $nama_jurusan) {
    $sql = "SELECT ID_JURUSAN FROM JURUSAN WHERE NAMA_JURUSAN = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$nama_jurusan]);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['ID_JURUSAN'] : null;
}

function getKebutuhanByNama($db, $nama_kebutuhan) {
    // Mengambil ID, Nama, dan Deskripsi
    $sql = "SELECT ID_SISWA_KEBUTUHAN, NAMA_KEBUTUHAN, DESKRIPSI_KEBUTUHAN 
            FROM SISWA_KEBUTUHAN_KHUSUS 
            WHERE NAMA_KEBUTUHAN = ?";
            
    $stmt = $db->prepare($sql);
    $stmt->execute([$nama_kebutuhan]);
    
    // Mengembalikan data dalam bentuk array asosiatif (satu baris)
    return $stmt->fetch(PDO::FETCH_ASSOC); 
}

// Fungsi untuk mengambil semua daftar Kebutuhan Khusus dari tabel Master
function getKebutuhanList($DBH) {
    // Ambil ID dan Nama Kebutuhan
    $sql = "SELECT ID_SISWA_KEBUTUHAN, NAMA_KEBUTUHAN,DESKRIPSI_KEBUTUHAN 
            FROM SISWA_KEBUTUHAN_KHUSUS 
            ORDER BY NAMA_KEBUTUHAN ASC";
    $stmt = $DBH->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fungsi untuk mengambil ID Master Kebutuhan berdasarkan Nama yang dipilih di Form
function getIDKebutuhan($DBH, $nama_kebutuhan) {
    $sql = "SELECT ID_SISWA_KEBUTUHAN 
            FROM SISWA_KEBUTUHAN_KHUSUS 
            WHERE NAMA_KEBUTUHAN = ?";
    $stmt = $DBH->prepare($sql);
    $stmt->execute([$nama_kebutuhan]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['ID_SISWA_KEBUTUHAN'] : null;
}

function deleteKebutuhanById($db, $id_kebutuhan) {
    $sql = "DELETE FROM siswa_kebutuhan_khusus WHERE ID_SISWA_KEBUTUHAN = ?";
            
    $stmt = $db->prepare($sql);
    $stmt->execute([$id_kebutuhan]);
    
    return $stmt->rowCount(); 
}

// Fungsi untuk mengambil data Kebutuhan Khusus yang telah dipilih siswa (Display)
function getSiswaKebutuhan($DBH, $id_siswa) {
    $sql = "SELECT 
                T2.NAMA_KEBUTUHAN, 
                T1.DESKRIPSI_SISWA_KHUSUS 
            FROM KEBUTUHAN T1
            JOIN SISWA_KEBUTUHAN_KHUSUS T2 
                ON T1.ID_SISWA_KEBUTUHAN = T2.ID_SISWA_KEBUTUHAN
            WHERE T1.ID_SISWA = ?";
    $stmt = $DBH->prepare($sql);
    $stmt->execute([$id_siswa]);
    return $stmt->fetch(PDO::FETCH_ASSOC); // Mengambil satu baris (karena kita anggap hanya boleh memilih satu)
}

function cekPendaftaran($db, $id_siswa) {
    // Panggil fungsi pengecekan profil
    if (!cekKelengkapanProfil($db, $id_siswa)) {
        // Jika tidak lengkap, langsung tendang/redirect
        header("Location: profil.php?status=profil_incomplete");
        exit;
    }
    // Jika lengkap, fungsi selesai dan kode di file utama akan lanjut
}

//ambil semua baris data jurusan
function getDaftarJurusan($db) {
    // Ambil semua kolom yang relevan dari tabel JURUSAN
    // Asumsi: kolom Kuota bernama KUOTA_JURUSAN
    $sql = "SELECT ID_JURUSAN, NAMA_JURUSAN, DESKRIPSI_JURUSAN 
            FROM JURUSAN 
            ORDER BY NAMA_JURUSAN ASC";
            
    $stmt = $db->query($sql);
    // Menggunakan fetchAll() untuk mendapatkan semua baris data
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
}

function getJurusanByNama($db, $nama_jurusan) {
    $sql = "SELECT ID_JURUSAN, NAMA_JURUSAN, DESKRIPSI_JURUSAN 
            FROM JURUSAN 
            WHERE NAMA_JURUSAN = ?";
            
    $stmt = $db->prepare($sql);
    $stmt->execute([$nama_jurusan]);
    
    // Kita harus memastikan ini hanya mengembalikan SATU baris
    return $stmt->fetch(PDO::FETCH_ASSOC); 
}

/**
 * Fungsi untuk mengupdate Jurusan berdasarkan ID JURUSAN (lebih stabil)
 */
function updateJurusanById($db, $nama_baru, $deskripsi_baru, $id_jurusan) {
    $sql = "UPDATE JURUSAN 
            SET NAMA_JURUSAN = ?, DESKRIPSI_JURUSAN = ? 
            WHERE ID_JURUSAN = ?"; // <-- Menggunakan ID yang stabil
            
    $stmt = $db->prepare($sql);
    $stmt->execute([$nama_baru, $deskripsi_baru, $id_jurusan]);
    
    return $stmt->rowCount(); 
}

function updateKebutuhanById($db, $nama_baru,$deskripsi_baru,$id_kebutuhan) {
    $sql = "UPDATE siswa_kebutuhan_khusus
            SET NAMA_KEBUTUHAN = ?,
            DESKRIPSI_KEBUTUHAN = ?
            WHERE ID_SISWA_KEBUTUHAN = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        $nama_baru,
        $deskripsi_baru,
        $id_kebutuhan
    ]);
    return $stmt->rowCount();
}

function simpanKebutuhanBaru($db, $nama_kebutuhan, $deskripsi_kebutuhan) {
    // Tentukan kuota default atau ambil dari input jika ada
    
    $sql = "INSERT INTO siswa_kebutuhan_khusus (NAMA_KEBUTUHAN, DESKRIPSI_KEBUTUHAN) 
            VALUES (?, ?)";
            
    $stmt = $db->prepare($sql);
    $result = $stmt->execute([
        $nama_kebutuhan, 
        $deskripsi_kebutuhan, 
    ]);
    
    // Mengembalikan true jika berhasil, false jika gagal
    return $result; 
}

function deleteJurusanById($db, $id_jurusan) {
    $sql = "DELETE FROM JURUSAN WHERE ID_JURUSAN = ?";
            
    $stmt = $db->prepare($sql);
    $stmt->execute([$id_jurusan]);
    
    return $stmt->rowCount(); 
}

function simpanJurusanBaru($db, $nama_jurusan, $deskripsi_jurusan) {
    // Tentukan kuota default atau ambil dari input jika ada
    $kuota_default = 0; 
    
    $sql = "INSERT INTO JURUSAN (NAMA_JURUSAN, DESKRIPSI_JURUSAN) 
            VALUES (?, ?)";
            
    $stmt = $db->prepare($sql);
    $result = $stmt->execute([
        $nama_jurusan, 
        $deskripsi_jurusan, 
    ]);
    
    // Mengembalikan true jika berhasil, false jika gagal
    return $result; 
}

function getDaftarSiswa($db) {
    $sql = "SELECT
    -- Kolom dari profil_siswa
        ps.ID_SISWA,
        p.ID_PENDAFTARAN,
        ps.NAMA_LENGKAP,
        ps.TEMPAT_LAHIR,
        ps.TANGGAL_LAHIR,
        ps.JENIS_KELAMIN,
        ps.ALAMAT,
        ps.ASAL_SEKOLAH,

    -- Kolom dari ppdb_siswa_kebutuhan_khusus (melalui tabel kebutuhan)
        ksk.NAMA_KEBUTUHAN,
        k.DESKRIPSI_SISWA_KHUSUS AS DESKRIPSI_KEBUTUHAN,

    -- Kolom dari wali_siswa
        ws.NAMA_WALI AS Wali,
        ws.NO_TELP AS No_Telpon_Wali,

        -- Kolom dari pendaftaran
        p.LOKASI_BERKAS AS Berkas,
        p.STATUS_PENDAFTARAN AS Status
    FROM
        ppdb.profil_siswa AS ps
    JOIN
        ppdb.pendaftaran AS p ON ps.ID_PENDAFTARAN = p.ID_PENDAFTARAN
    JOIN
        ppdb.wali_siswa AS ws ON ps.ID_WALI = ws.ID_WALI
    LEFT JOIN
        ppdb.kebutuhan AS k ON ps.ID_SISWA = k.ID_SISWA
    LEFT JOIN
        ppdb.siswa_kebutuhan_khusus AS ksk ON k.ID_SISWA_KEBUTUHAN = ksk.ID_SISWA_KEBUTUHAN
    ORDER BY
        ps.ID_SISWA";

    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function updateStatusPendaftaran($db, $id_siswa, $status_baru) {
    $stmt_id = $db->prepare("SELECT ID_PENDAFTARAN FROM PROFIL_SISWA WHERE ID_SISWA = ?");
    $stmt_id->execute([$id_siswa]);
    $result = $stmt_id->fetch(PDO::FETCH_ASSOC);

    if ($result && $result['ID_PENDAFTARAN']) {
        $id_pendaftaran = $result['ID_PENDAFTARAN'];
        $sql = "UPDATE PENDAFTARAN SET STATUS_PENDAFTARAN = ? WHERE ID_PENDAFTARAN = ?";
        $stmt = $db->prepare($sql);
        return $stmt->execute([$status_baru, $id_pendaftaran]);
    }
    return false;
}