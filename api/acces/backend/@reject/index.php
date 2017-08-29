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
	
	$reject = $perintah->getDB()->query("DELETE friend WHERE userid = '$sessionid' AND idfriend = '$idfriend', date = '$date'");

	