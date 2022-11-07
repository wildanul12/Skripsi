<?php
	include('koneksi.php');

	$id 		=$_POST['id'];
	$meteran 	=$_POST['meteran'];
	$nama		=$_POST['nama'];
	$alamat		=$_POST['alamat'];
	$golongan 	=$_POST['golongan'];
	

	$update	= mysqli_query($conn, "UPDATE `monitoring` SET `meteran` = '$meteran', `nama` = '$nama', `alamat` = '$alamat', `golongan` = '$golongan' WHERE `meteran` = '$meteran'");

	if($update){
		echo "<script>alert('Yess Data Berhasil Diubah');
		window.location='monitoring.php'</script>";
	}else{
		echo "<script>alert('Aduhh Data Gagal Diubah');
		window.location='edit_monitoring.php'</script>";
	}
?>