<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Validasi</title>
</head>
<body>
<h1>Membuat Form Validasi dengan PHP<b/></h1>
<?php 
if (isset($_GET['nama'])) {
	if ($_GET['nama']=="kosong") {
		echo "<h4 style='color:red'> nama belum dimasukkan!<h4>";
	}
}
 ?>
 <h4>Masukkan Nama Anda :</h4>
 <form action="cek.php" method="post">
 	<table>
 		<tr>
 			<td>Nama</td>
 			<td><input type="text" name="nama"></td>
 			<td><input type="submit" value="Submit"></td>
 		</tr>
 	</table>
 </form>
</body>
</html>