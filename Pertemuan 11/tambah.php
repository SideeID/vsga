<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form input barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="halaman">
        <h2>Input Barang</h2>
        <br>
        <form method="POST">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="no" placeholder="no" name="no">
            <label for="no">Nomor</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nama" placeholder="nama" name="nama">
            <label for="nama">Nama</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="warna" placeholder="warna" name="warna">
            <label for="warna">Warna</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="jumlah" placeholder="jumlah" name="jumlah">
            <label for="jumlah">Jumlah</label>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-secondary">Ulangi</button>
        <a href="index.php" class="btn btn-primary">Kembali</a>
        </form>
        <br>
        <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $no = $_POST['no'];
        $nama = $_POST['nama'];
        $warna = $_POST['warna'];
        $jumlah = $_POST['jumlah'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "vsga";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("koneksi gagal: " . $conn->connect_error);
        }

        $sql = "INSERT INTO barang (`no`, nama, warna, jumlah) VALUES ('$no', '$nama', '$warna', '$jumlah')";

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
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>