<?php
	session_start();

	// we destroy the session ir
	session_destroy();
	header('Location: ../../index.php');
	exit();
?>