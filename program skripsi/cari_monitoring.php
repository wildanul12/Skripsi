<?php include 'koneksi.php'; ?>
<?php $kywrd = $_POST['keyword'] ?>
<?php $sql = mysqli_query($conn, "SELECT sensor.meteran, monitoring.nama, monitoring.alamat, monitoring.golongan, sensor.liter 
		FROM sensor INNER JOIN monitoring ON sensor.meteran = monitoring.meteran WHERE sensor.meteran = '$kywrd' ORDER BY id_sensor DESC LIMIT 1"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Monitoring Client</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div style="background-color: blue; padding: 12px; text-align: left;">	
<h2 align="center"><a href="#" style="color: white;">Laporan Data Monitoring Pengeluaran Debit Air</a></h2>
<button size="10" class="btn btn-success"><a style="color: white;" href="monitoring.php">KEMBALI</a></button>
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
<table border="'1" width="100%">
	<tr style="background-color: blue">
			<td align="center"><a href="#" style="color: white;">No.</a></td>
			<td align="center"><a href="#" style="color: white;">Nomor Meteran</a></td>
			<td align="center"><a href="#" style="color: white;">Nama Pelanggan</a></td>
			<td align="center"><a href="#" style="color: white;">Alamat Pelanggan</a></td>
			<td align="center"><a href="#" style="color: white;">Golongan</a></td>
			<td align="center"><a href="#" style="color: white;">Penggunaan Air</a></td>
			<td align="center"><a href="#" style="color: white;">Pembayaran</a></td>
			<td align="center"><a href="#" style="color: white;"> AKSI </a></td>
	</tr>
<?php 
include"koneksi.php";
		if (isset($_POST['submit'])) {
			$cari=$_POST['cari'];
			$tampil=mysqli_query($conn, "SELECT*FROM monitoring WHERE meteran LIKE 'cari'%");
		}

$no=1;
$query = mysqli_query($conn, "SELECT SUM(liter) AS total FROM `sensor` WHERE meteran = '$kywrd' ORDER BY id_sensor DESC LIMIT 1");
$fetch = mysqli_fetch_array($query);
while($output = mysqli_fetch_array($sql)){ 
?>
<?php
include"koneksi.php";
$pembayaran=0;
$total = $fetch['total'];
$meteran = $output['meteran'];
$conn = mysqli_connect("localhost", "root", "","meteran");
if($output['golongan'] =="1A")
{
	$pembayaran=$fetch['total'] * 1.0 * 1000 * 1.1;
}
else if  ($output['golongan'] =="1B")
{
	$pembayaran=$fetch['total'] * 1.0 * 2000 * 1.1;
}

$update	= mysqli_query($conn, "UPDATE `sensor` SET `meteran` = '$meteran', `total` = '$total', `pembayaran` = '$pembayaran' WHERE `meteran` = '$meteran'");
    
?>

	<tr>
		<td align="center"><?php echo $no++;?></td>
		
		<td align="center"><?php echo $output['meteran'];?></td>
		<td align="center"><?php echo $output['nama'];?></td>
		<td align="center"><?php echo $output['alamat'];?></td>
		<td align="center"><?php echo $output['golongan'];?></td>
		<td align="center"><?php echo $fetch['total'] * 1.0 ;?>  (Liter)</td>
		<td align="center">Rp. <?php echo $pembayaran;?></td>
		<td align="center">
		<button><a href="edit_monitoring.php?meteran=<?php echo $output['meteran'];?>">EDIT </a></button>
		<button> <a href="hapus_monitoring.php?meteran=<?php echo $output['meteran'];?>">HAPUS</a> </button
		</td>
	</tr>
<?php } ?>
</table>

<hr width="100%" color="#ff0000" >

<?php include 'koneksi.php'; ?>
<?php $kywrd = $_POST['keyword'] ?>
<?php $sql = mysqli_query($conn, "SELECT * FROM sensor WHERE meteran = '$kywrd'"); ?>
<div style="background-color: blue; padding: 5px; text-align: right;">	
<h4 align="center"><a href="#" style="color: white;">Laporan Data Monitoring Secara Detail</a></h4>
</div>
<table border="'1'" width="100%">
	<tr style="background-color: blue">
			<td align="center"><a href="#" style="color: white;">No.</a></td>
			<td align="center"><a href="#" style="color: white;">Nomor Meteran</a></td>
			<td align="center"><a href="#" style="color: white;">Pengeluaran Debit</a></td>
			<td align="center"><a href="#" style="color: white;">Pengeluaran Volume</a></td>
			<td align="center"><a href="#" style="color: white;">Penggunaan Air (Liter)</a></td>
	</tr>
<?php $no = 1; ?>
<?php while($output = mysqli_fetch_array($sql)){ ?>
	<tr>
		<td align="center"><?php echo $no++;?></td>
		<td align="center"><?php echo $output['meteran'];?></td>
		<td align="center"><?php echo $output['debit'];?> (L/min) </td>
		<td align="center"><?php echo $output['volume'];?> (mL/Sec) </td>
		<td align="center"><?php echo $output['liter'];?> (Liter) </td>
	</tr>
<?php } ?>
<?php
					$query = mysqli_query($conn, "SELECT SUM(liter) AS total FROM `sensor` WHERE meteran = '$kywrd'");
					$fetch = mysqli_fetch_array($query); {
?>
<tr>
<td colspan="4" align="center"> JUMLAH </td>
<td align="center">
<?php echo $fetch['total'] * 1.0 ;?> (Liter) </td>
<tr>
<?php } ?>
</table>