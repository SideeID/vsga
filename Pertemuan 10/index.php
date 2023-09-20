<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Biodata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div>
        <h2>Form Biodata</h2>
        <form method="POST">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nama" placeholder="nama" name="nama">
            <label for="nama">Nama</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nim" placeholder="nim" name="nim">
            <label for="nim">NIM</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="kelas" placeholder="kelas" name="kelas">
            <label for="kelas">Kelas</label>
        </div>
        <div class="form-floating">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="jenis_kelamin">
                <option selected disabled>-</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <label for="floatingSelect">Jenis kelamin</label>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <hr>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $kelas = $_POST['kelas'];
        $jenis_kelamin = $_POST['jenis_kelamin'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "vsga";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $sql = "INSERT INTO data (nama, nim, kelas, jenis_kelamin) VALUES ('$nama', '$nim', '$kelas', '$jenis_kelamin')";

        if ($conn->query($sql) === TRUE) {
            echo "<h2>Hasil Biodata</h2>";
            echo "<p>Nama: $nama</p>";
            echo "<p>NIM: $nim</p>";
            echo "<p>Kelas: $kelas</p>";
            echo "<p>Jenis Kelamin: $jenis_kelamin</p>";
            echo "<p>Data berhasil disimpan.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
