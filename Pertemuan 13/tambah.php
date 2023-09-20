<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INPUT DATA MAHASISWA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="halaman">
        <h2>Input data siswa</h2>
        <br>
        <form method="POST">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nama" placeholder="nama" name="nama">
            <label for="nama">Nama</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" id="alamat" placeholder="alamat" name="alamat"></textarea>
            <label for="alamat">Alamat</label>
        </div>
        <div class="form-check">
            <label for="jenis_kelamin">Jenis kelamin</label><br>
            <input type="radio" id="jenis_kelamin_laki" name="jenis_kelamin" value="Laki-laki">
            <label for="jenis_kelamin_laki">Laki-laki</label><br>
            <input type="radio" id="jenis_kelamin_perempuan" name="jenis_kelamin" value="Perempuan">
            <label for="jenis_kelamin_perempuan">Perempuan</label>
        </div>
        <div class="form-floating">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="agama">
                <option selected disabled>-</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
            </select>
            <label for="floatingSelect">Agama</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="asal_sekolah" placeholder="asal_sekolah" name="asal_sekolah">
            <label for="asal_sekolah">Asal sekolah</label>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-secondary">Ulangi</button>
        <a href="index.php" class="btn btn-primary">Kembali</a>
        </form>
        <br>
        <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $asal_sekolah = $_POST['asal_sekolah'];

        if (empty($nama) || empty($alamat) || empty($jenis_kelamin) || empty($agama) || empty($asal_sekolah)) {
            echo "<b><strong>Harap isi semua field form</strong></b>";
        } else {
            include 'koneksi.php';
    
            if ($conn->connect_error) {
                die("koneksi gagal: " . $conn->connect_error);
            }
    
            $sql = "INSERT INTO siswa (nama, alamat, jenis_kelamin, agama, asal_sekolah) VALUES ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$asal_sekolah')";
    
            if ($conn->query($sql) === true) {
                echo "Data berhasil disimpan";
                $conn->close();
                header("location: index.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
    }
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>