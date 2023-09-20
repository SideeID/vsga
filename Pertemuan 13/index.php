<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA MAHASISWA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    include 'koneksi.php';

    if ($conn->connect_error) {
        die("koneksi gagal: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM siswa";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class=\"table\">
            <thead>
                <tr>
                    <th scope=\"col\">Nama</th>
                    <th scope=\"col\">Alamat</th>
                    <th scope=\"col\">Jenis kelamin</th>
                    <th scope=\"col\">Agama</th>
                    <th scope=\"col\">asal sekolah</th>
                    <th scope=\"col\">Fungsi</th>
                </tr>
            </thead>
            <tbody class=\"table-group-divider\">";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['nama'] . "</td>
                    <td>" . $row['alamat'] . "</td>
                    <td>" . $row['jenis_kelamin'] . "</td>
                    <td>" . $row['agama'] . "</td>
                    <td>" . $row['asal_sekolah'] . "</td>
                    <td>
                        <a href=\"form-edit.php?SiswaID=" . $row['SiswaID'] . "\" class=\"btn btn-secondary\">Edit</a>
                        <a href=\"hapus.php?SiswaID=" . $row['SiswaID'] . "\" class=\"btn btn-danger\" onClick=\"return confirm('Apakah anda yakin ingin menghapusnya?')\">Hapus</a>
                    </td>
                </tr>";
        }
        echo "</tbody>
            <tfoot>
                <tr>
                    <td colspan=\"6\">
                        <a href=\"tambah.php\" class=\"btn btn-primary\">Tambah data</a>
                    </td>
                </tr>
            </tfoot>
        </table>";
    } else {
        echo "No data found";
    }
    $conn->close();
    ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>