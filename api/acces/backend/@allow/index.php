<?php 
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');

session_start();
$perintah = new CORE();

	$date = date('Y-m-d H:i:s');
	$idfriend = $_POST['id'];
	$sessionid = $_SESSION['id'];
	
	$add = $perintah->getDB()->query("INSERT INTO friend SET userid = '$sessionid', idfriend = '$idfriend', date = '$date', status = '1'");

	$update = $perintah->getDB()->query("UPDATE friend SET status = '1' WHERE userid = '$idfriend' AND idfriend = '$sessionid'");

	