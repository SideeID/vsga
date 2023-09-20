<?php 	
$nama = $_POST['nama'];

if ($nama=="") {
	header("location:kominfo.php");
}else{
	echo "nama anda adalah ".$nama;
}
 ?>