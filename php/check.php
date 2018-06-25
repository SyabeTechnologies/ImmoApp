<?php

	ob_start();

	if($_SESSION['statut_immo']!=1)
	{
		echo "<script type='text/javascript'>location.href = '../index.php';</script>";
	}

	ob_end_flush();
	
?>