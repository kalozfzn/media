<?php 
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');

session_start();
$perintah = new CORE();

	$message = $_POST['message'];
	$date = date('Y-m-d H:i:s');
	$sessionid = $_SESSION['id'];


	if (empty($message)) {
		echo "string";
	} 
		else{

			$perintah->getDB()->query("INSERT INTO chat SET idfrom = '$sessionid', idto = '21', message='$message', date='$date', status = '0'");

		}