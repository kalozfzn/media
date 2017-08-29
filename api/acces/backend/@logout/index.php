<?php 
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');

session_start();
$perintah = new CORE();
	$id = $_SESSION['id'];
	$perintah->getDB()->query("UPDATE user SET status = 'offline' WHERE userid = '$id'");
	session_destroy();

	$perintah->getRedirect("");