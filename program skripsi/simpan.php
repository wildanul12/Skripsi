<?php
include('koneksi.php');

$meteran	=$_POST['meteran'];
$nama		=$_POST['nama'];
$alamat		=$_POST['alamat'];
$golongan	=$_POST['golongan'];

if (empty($meteran)) {
	echo "<script>alert('Data belum terisi lengkap!');
			window.location='tambah.php'</script>";
}else if (empty($nama)) {
	echo "<script>alert('Data belum terisi lengkap!');
			window.location='tambah.php'</script>";
}else if (empty($alamat)) {
	echo "<script>alert('Data belum terisi lengkap!');
			window.location='tambah.php'</script>";
}else if (empty($golongan)) {
	echo "<script>alert('Data belum terisi lengkap!');
			window.location='tambah.php'</script>";
}
else{
	$simpan	= mysqli_query($conn, "INSERT INTO monitoring VALUES(NULL, '$meteran','$nama','$alamat','$golongan','$meteran')") or die(mysqli_error());

	if($simpan){
			echo "<script>alert('Data Berhasil Disimpan');
			window.location='monitoring.php'</script>";
			}
			echo "<script>alert('Data Gagal Disimpan');
			window.location='tambah.php'</script>";
	}
?>