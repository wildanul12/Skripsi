<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sistem Informasi PDAM | Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="css/nouislider.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body style="background-color: red;">
		
  <div class="main-section">

		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">PERUSAHAAN DAERAH AIR MINUM</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="dropdown nav-item">
            </li>
	          
	        </ul>
	      </div>
		  <a class="navbar-brand" href="login.php" style="color: white;">LOGIN</a>
		  </div>
	  </nav>
	  
    <!-- END nav -->

  	<section class="hero-wrap js-fullheight" data-stellar-background-ratio="0.0">
  		<div class="overlay"></div>
  		<div class="container">
  			<div class="row description js-fullheight align-items-center justify-content-center">
  				<div class="col-md-8 text-center">
  					<img style="width: 220px; margin-bottom: 30px;" src="images/uin1.png">
  					<div class="text">
  						<h1 class="mb-4"><span><a href="#" style="color: white;">SISTEM INFORMASI PDAM</a></span></h1>
  					</div>
  					<div>
					<form action="cari.php" method="post">
	<input type="text" name="keyword" size="25" autofocus placeholder="Cari Nomor Meteran" autocomplete="off">
	<button type="submit" name="cari">CARI</button>
</form>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
	<?php
		include"koneksi.php";
		if (isset($_POST['submit'])) {
			$cari=$_POST['cari'];
			$tampil=mysqli_query($conn, "SELECT*FROM monitoring WHERE meteran LIKE 'cari'%");
		}
?>
		
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/nouislider.min.js"></script>
  <script src="js/moment-with-locales.min.js"></script>
  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>