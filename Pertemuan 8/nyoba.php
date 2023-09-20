<?php
function usdToIdr($jumlah) {
    $nilaiTukar = 14000;
    $konversi = $jumlah * $nilaiTukar;
    return $konversi;
}

function idrToUsd($jumlah) {
    $nilaiTukar = 1/14000;
    $konversi = $jumlah * $nilaiTukar;
    return $konversi;
}

if (isset($_POST['hitung'])) {
    $jumlah = $_POST['jumlah'];
    $mataUang = $_POST['mata_uang'];

    if ($mataUang == 'usd') {
        $konversi = usdToIdr($jumlah);
        $hasil = "Rp. " . number_format($konversi, 2);
    } elseif ($mataUang == 'idr') {
        $konversi = idrToUsd($jumlah);
        $hasil = "$" . number_format($konversi, 2);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="halaman">
        <h1>Konversi mata uang</h1>
        <form action="" method="post">
            <input type="text" name="jumlah">
            <select name="mata_uang" id="">
                <option value="usd">USD ke IDR</option>
                <option value="idr">IDR ke UD+SD</option>
            </select>
            <button type="submit" name="hitung"konverso></button>
        </form>
        <?php if (isset($hasil)): ?>
            <h3>Hasil Konversi:</h3>
            <p><?php echo $hasil; ?></p>
        <?php endif; ?>

    </div>
</body>
</html>