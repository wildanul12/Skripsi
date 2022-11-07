<?php
 include('koneksi.php');
	$meteran = isset ($_GET['meteran']) ? $_GET['meteran'] : null;
	$debit = isset ($_GET['debit']) ? $_GET['debit'] : null;
	$volume = isset ($_GET['volume']) ? $_GET['volume'] : null;
	$liter = isset ($_GET['liter']) ? $_GET['liter'] : null;
    $conn = mysqli_connect("localhost", "root", "","meteran");

    // Prepare the SQL statement
    $save = mysqli_query ($conn,"INSERT INTO sensor (meteran, debit, volume, liter) VALUES ('".$meteran."', '".$debit."', '".$volume."', '".$liter."')");    
    
    if (!$save) 
        {
            die ('Invalid query: '.mysqli_error($conn));
        }  
?>