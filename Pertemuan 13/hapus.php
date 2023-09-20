<?php 
include 'koneksi.php';
$id		= $_GET['SiswaID'];
$query=	"DELETE from siswa where SiswaID='$id'";
mysqli_query($conn, $query);
header("location:index.php");
 ?>