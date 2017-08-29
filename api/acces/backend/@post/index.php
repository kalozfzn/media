<?php 
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');

session_start();
$perintah = new CORE();

	$sessionId =  $_SESSION['id'];
	$post = $perintah->AntiInjection($_POST['status']);
	$date = date('Y-m-d H:i:s');

	if ($post == "") {
		echo "<script>alert('Tidak Boleh Kosong')</script>";
	} 
		else {

			$perintah->getDB()->query("INSERT INTO post SET userid = '$sessionId', content = '$post',date = '$date'");
		}