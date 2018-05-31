<?php 
    $dbhost = 'localhost';

    $dbuser = 'root';

    $dbpass = '';
            
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'ImmoApp');

    if (mysqli_connect_errno())
	 {
	 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 }
	 
?>

