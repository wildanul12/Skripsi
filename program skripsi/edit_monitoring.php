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
	<title>Edit Monitoring</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div style="background-color: blue; padding: 12px; text-align: left;">	
<h2 align="center"><a href="#" style="color: white;">Edit Input Monitoring</a></h2>
<button size="10" class="btn btn-success"><a href="monitoring.php" style="color: white;">KEMBALI</a></button>
</div>
<table border="'1" width="100%" class="table">
	<tr style="background-color: red">

<?php
include"koneksi.php";
$meteran = isset($_GET['meteran']) ? $_GET['meteran'] : null;
$edit="SELECT*FROM monitoring where meteran='$meteran'";
$query=mysqli_query($conn,$edit);
$data=mysqli_fetch_array($query);
?>

<form action="update_monitoring.php" method="post" enctype="multipart/form-data">
<table border="'1" width="100%" class="table">
	<tr style="background-color: blue">

				<th align="center"><a href="#" style="color: white;">Nomor Meteran</a></th>
				<th align="center"><a href="#" style="color: white;">Nama Pelanggan</a></th>
				<th align="center"><a href="#" style="color: white;">Alamat Pelanggan</a></th>
				<th align="center"><a href="#" style="color: white;">Golongan</a></th>
				<th align="center"><a href="#" style="color: white;">Aksi</a></th></tr>
		
				<input type="hidden" name="meteran" value="<?php echo $data['meteran'];?>">
				<td align="center"><?php echo $data['meteran'];?></td>
				<td><input type="text" name="nama" value="<?php echo $data['nama'];?>"></td>
				<td><input type="text" name="alamat" value="<?php echo $data['alamat'];?>"></td>
				<input type="hidden" name="golongan" value="<?php echo $data['golongan'];?>">
				<td align="center"><?php echo $data['golongan'];?></td>
			<input type="hidden" name="id" value="<?= $data['id'];?>">
			<td><button type="submit" value="submit">Update</button>
		</tr>

	</table>
</form>
</body>
</html>

</body>
</html>