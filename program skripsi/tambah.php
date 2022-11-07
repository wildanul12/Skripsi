<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Monitoring Pengeluaran Debit Air | Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
<body class="hero-wrap">
	<div style="background-color: blue; padding: 12px; text-align: center;">
		<h1 align="left" style="color: white; margin-left: 30px;margin-top: 30px; text-align: center;">
			Monitoring Pengeluaran Debit Air
		</h1>
	</div>
	<hr>
	<div>
		<form action="simpan.php" method="post" enctype="multipart/form-data">
			<table class="table">
				<tr>
					<th>Nomor Meteran</th>
					<th>Nama Pelanggan</th>
					<th>Alamat Pelanggan</th>
					<th>Golongan</th>
				</tr>
				<tr>
					<td><input type="text" name="meteran" placeholder="Nomor Meteran"></td>
					<td><input type="text" name="nama" placeholder="Nama Lengkap"></td>
					<td><input type="text" name="alamat" placeholder="Alamat"></td>
					<td>
                        <select name="golongan">
							<option value="">PILIH</option>
                            <option value="1A">1A</option>
                            <option value="1B">1B</option>
                            <option value="2A">2A</option>
							<option value="2B">2B</option>
                        </select>
                    </td>
				</tr>
			</table>
			<center>
				<img src="images/water.png" style="width: 220px;opacity: 20%;">
			</center>
			<div style="text-align: right; margin-right: 32px;">
				<button class="btn btn-warning"><a style="color: black;" href="monitoring.php">Kembali</a></button>
				<input type="reset" value="Batal" class="btn btn-danger">
				<input  type="submit" value="Simpan" class="btn btn-success" style="color: white;">
			</div>
		</form>
	</div>
</body>
</html>