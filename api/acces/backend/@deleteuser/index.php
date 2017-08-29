<?php 
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');

session_start();
$perintah = new CORE();
	
	$id = $_POST['id'];

	$perintah->getDB()->query("DELETE FROM user WHERE userid = '$id'");
		