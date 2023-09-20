<!DOCTYPE html>
<html>
<head>
    <title>Form Biodata</title>
    <style>
        body {
            font-size: 16px;
        }

        label {
            display: block;
            margin-top: 10px;
        }
        select {
            font-size: 16px;
            padding: 5px;
        }

        button {
            font-size: 16px;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Form Biodata</h2>
    <form method="POST" action="">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" required>

        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" name="tempat_lahir" id="tempat_lahir" required>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="usia">Usia:</label>
        <input type="number" name="usia" id="usia" required>

        <button type="submit">Simpan</button>
    </form>

    <?php
    // Proses pengiriman data form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $usia = $_POST['usia'];

        // Menampilkan hasil biodata
        echo "<h2>Hasil Biodata:</h2>";
        echo "<p>Nama: $nama</p>";
        echo "<p>Alamat: $alamat</p>";
        echo "<p>Tempat, Tanggal Lahir: $tempat_lahir, $tanggal_lahir</p>";
        echo "<p>Jenis Kelamin: $jenis_kelamin</p>";
        echo "<p>Usia: $usia tahun</p>";
    }
    ?>
</body>
</html>
