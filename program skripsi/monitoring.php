<?php 
  session_start();
  if (!isset($_SESSION['username'])) {
    header('Location: login.php');
  }else{
    $username = $_SESSION['username'];
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Monitoring</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta http-equiv="refresh" content="120" />
</head>
<body>
<div style="background-color: blue; padding: 12px; text-align: right;">	
<h2 align="center"><a href="#" style="color: white;">Laporan Data Monitoring</a></h2>
<button size="10" class="btn btn-success"><a style="color: white;" href="tambah.php">Tambah Data</a></button>
<button size="10" class="btn btn-success"><a style="color: white;" href="logout.php">LOGOUT</a></button>
</div>
<?php
include"koneksi.php";
$id = isset($_GET['id']) ? $_GET['id'] : null;
$meteran = isset($_GET['meteran']) ? $_GET['meteran'] : null;
$golongan = isset($_GET['golongan']) ? $_GET['golongan'] : null;
$liter = isset($_GET['liter']) ? $_GET['liter'] : null;
$edit=("SELECT*FROM monitoring where id='$id'");
$query=mysqli_query($conn,$edit);
@$data=mysqli_fetch_array($query);
?>
<form action="cari_monitoring.php" method="post">
	<input type="text" name="keyword" size="25" autofocus placeholder="Cari Nomor Meteran" autocomplete="off">
	<button type="submit" name="cari">CARI</button>
</form>
<table border="'1" width="100%" class="table">
	<tr style="background-color: blue">
			<td align="center"><a href="#" style="color: white;">No.</a></td>
			<td align="center"><a href="#" style="color: white;">Nomor Meteran</a></td>
			<td align="center"><a href="#" style="color: white;">Nama Pelanggan</a></td>
			<td align="center"><a href="#" style="color: white;">Alamat Pelanggan</a></td>
			<td align="center"><a href="#" style="color: white;">Golongan</a> </td>
			<td align="center"><a href="#" style="color: white;">Penggunaan Air</a></td>
			<td align="center"><a href="#" style="color: white;">Pembayaran Air</a></td>
			<td align="center"><a href="#" style="color: white;">Waktu</a></td>
			<td align="center"><a href="#" style="color: white;">Aksi</a></td>
	</tr>
<?php
		include"koneksi.php";
		if (isset($_POST['submit'])) {
			$cari=$_POST['cari'];
			$tampil=mysqli_query($conn, "SELECT sensor.meteran, monitoring.nama, monitoring.alamat, monitoring.golongan, sensor.liter 
		FROM sensor INNER JOIN monitoring ON sensor.meteran = monitoring.meteran WHERE sensor.meteran LIKE 'cari'%");
		}

		$no=1;
		$tampil=mysqli_query($conn, "SELECT SUM(sensor.liter) AS total, sensor.meteran, monitoring.nama, monitoring.alamat, monitoring.golongan, sensor.liter, sensor.waktu 
		FROM sensor INNER JOIN monitoring ON sensor.meteran = monitoring.meteran 
		where id_sensor group by meteran");
		while($data=mysqli_fetch_array($tampil))
		{
			
?>
<?php
include"koneksi.php";
$pembayaran=0;
$total = $data['total'];
$meteran = $data['meteran'];
$conn = mysqli_connect("localhost", "root", "","meteran");
if($data['golongan'] =="1A")
{
	$pembayaran=$data['total'] * 1.0 * 1000 * 1.1;
}
else if  ($data['golongan'] =="1B")
{
	$pembayaran=$data['total'] * 1.0 * 2000 * 1.1;
}

$update	= mysqli_query($conn, "UPDATE `sensor` SET `meteran` = '$meteran', `total` = '$total', `pembayaran` = '$pembayaran' WHERE `meteran` = '$meteran'");
    
?>
		<tr>
			<td align="center"><?php echo $no++;?></td>
			<td align="center"><?php echo $data['meteran'];?></td>
			<td align="center"><?php echo $data['nama'];?></td>
			<td align="center"><?php echo $data['alamat'];?></td>
			<td align="center"><?php echo $data['golongan'];?> </td>
			<td align="center"><?php echo $data['total'];?> (Liter) </td>
			<td align="center">Rp. <?php echo $pembayaran;?></td>
			<td align="center"><?php echo $data['waktu'];?> </td>
			<td align="center">
			<button><a href="edit_monitoring.php?meteran=<?php echo $data['meteran'];?>">EDIT </a></button>
			<button><a href="hapus_monitoring.php?meteran=<?php echo $data['meteran'];?>">HAPUS</a></button>
			</form>
			</td>
		</tr>
<?php }?>
</table>
</body>
</html>