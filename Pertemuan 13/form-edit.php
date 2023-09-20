<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['SiswaID'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $asal_sekolah = $_POST['asal_sekolah'];

    if (empty($nama) || empty($alamat) || empty($jenis_kelamin) || empty($agama) || empty($asal_sekolah)) {
        echo "<b><strong>Harap isi semua field form</strong></b>";
    } else {
        $sql = "UPDATE siswa SET nama=?, alamat=?, jenis_kelamin=?, agama=?, asal_sekolah=? WHERE SiswaID=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $nama, $alamat, $jenis_kelamin, $agama, $asal_sekolah, $id);

        if ($stmt->execute()) {
            echo "Data berhasil diupdate";
            $stmt->close();
            $conn->close();
            header("location: index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
} else {
    if (isset($_GET['SiswaID'])) {
        $id = $_GET['SiswaID'];

        $sql = "SELECT * FROM siswa WHERE SiswaID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $nama = $row['nama'];
            $alamat = $row['alamat'];
            $jenis_kelamin = $row['jenis_kelamin'];
            $agama = $row['agama'];
            $asal_sekolah = $row['asal_sekolah'];
        } else {
            echo "SiswaID tidak valid";
            exit();
        }

        $stmt->close();
    } else {
        echo "SiswaID tidak ditemukan";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="halaman">
        <h2>Edit data siswa</h2>
        <br>
        <form method="POST">
            <input type="hidden" name="SiswaID" value="<?php echo $id; ?>">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" value="<?php echo $nama; ?>">
                <label for="nama">Nama</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" id="alamat" placeholder="alamat" name="alamat"><?php echo $alamat; ?></textarea>
                <label for="alamat">Alamat</label>
            </div>
            <div class="form-check">
                <label for="jenis_kelamin">Jenis kelamin</label><br>
                <input type="radio" id="jenis_kelamin_laki" name="jenis_kelamin" value="Laki-laki" <?php if ($jenis_kelamin === 'Laki-laki') echo 'checked'; ?>>
                <label for="jenis_kelamin_laki">Laki-laki</label><br>
                <input type="radio" id="jenis_kelamin_perempuan" name="jenis_kelamin" value="Perempuan" <?php if ($jenis_kelamin === 'Perempuan') echo 'checked'; ?>>
                <label for="jenis_kelamin_perempuan">Perempuan</label>
            </div>
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="agama">
                    <option selected disabled>-</option>
                    <option value="Islam" <?php if ($agama === 'Islam') echo 'selected'; ?>>Islam</option>
                    <option value="Kristen" <?php if ($agama === 'Kristen') echo 'selected'; ?>>Kristen</option>
                    <option value="Hindu" <?php if ($agama === 'Hindu') echo 'selected'; ?>>Hindu</option>
                    <option value="Budha" <?php if ($agama === 'Budha') echo 'selected'; ?>>Budha</option>
                </select>
                <label for="floatingSelect">Agama</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="asal_sekolah" placeholder="asal_sekolah" name="asal_sekolah" value="<?php echo $asal_sekolah; ?>">
                <label for="asal_sekolah">Asal sekolah</label>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="index.php" class="btn btn-primary">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
