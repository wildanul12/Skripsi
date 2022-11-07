<?php
include('koneksi.php');
$meteran = isset($_GET['meteran']) ? $_GET['meteran'] : null;
$hapus_monitoring="DELETE a.*, b.* FROM sensor a, monitoring b WHERE a.meteran = '$meteran' AND b.meteran = '$meteran'";
mysqli_query($conn,$hapus_monitoring);
echo"
<script>
alert('Berhasil Dihapus');
window.location='monitoring.php';
</script>";
?>