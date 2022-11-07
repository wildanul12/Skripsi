<?php
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "meteran";
$conn = mysqli_connect("localhost", "root", "", "meteran");
if(mysqli_connect_error()){ // mengecek apakah koneksi database error
		echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error(); // pesan ketika koneksi database error
	}
?>