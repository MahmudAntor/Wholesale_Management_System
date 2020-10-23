<?php
	session_start();
	
	if (!isset($_SESSION['manager_ID'])){
		header('Location: trial.php');
	}
?>