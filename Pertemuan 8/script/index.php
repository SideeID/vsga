<?php
function usdKeIdr($jumlah) {
    $nilaiTukar = 14400;

    $jumlahTerkonversi = $jumlah * $nilaiTukar;
    return $jumlahTerkonversi;
}

function idrKeUsd($jumlah) {
    $nilaiTukar = 1 / 14400;

    $jumlahTerkonversi = $jumlah * $nilaiTukar;
    return $jumlahTerkonversi;
}

function yenKeIdr($jumlah) {
    $nilaiTukar = 104;

    $jumlahTerkoversi = $jumlah * $nilaiTukar;
    return $jumlahTerkoversi;
}

function idrKeYen($jumlah) {
    $nilaiTukar = 1 / 104;

    $jumlahTerkoversi = $jumlah * $nilaiTukar;
    return $jumlahTerkoversi;
}

if (isset($_POST['konversi'])) {
    $jumlah = $_POST['jumlah'];
    $mataUang = $_POST['mata_uang'];

    if ($mataUang == 'usd') {
        $jumlahTerkonversi = usdKeIdr($jumlah);
        $hasil =  "Rp. " . number_format($jumlahTerkonversi, 2);
    } elseif ($mataUang == 'idr') {
        $jumlahTerkonversi = idrKeUsd($jumlah);
        $hasil = "$" . number_format($jumlahTerkonversi, 2);
    } elseif ($mataUang == 'yen') {
        $jumlahTerkonversi = yenKeIdr($jumlah);
        $hasil = "Rp. " . number_format($jumlahTerkonversi, 2);
    } elseif ($mataUang == 'idrY') {
        $jumlahTerkonversi = idrKeYen($jumlah);
        $hasil = number_format($jumlahTerkonversi, 2) . "¥";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konversi Mata Uang</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="halaman">
        <h1>Konversi Mata Uang</h1>
        <form method="post" action="">
            <input type="text" name="jumlah" placeholder="Jumlah">
            <select name="mata_uang">
                <option value="usd">USD ke IDR</option>
                <option value="idr">IDR ke USD</option>
                <option value="yen">YEN ke IDR</option>
                <option value="idrY">IDR ke YEN</option>
            </select>
            <button type="submit" name="konversi">Konversi</button>
        </form>

        <?php if (isset($hasil)): ?>
            <h3>Hasil Konversi:</h3>
            <p><?php echo $hasil; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
