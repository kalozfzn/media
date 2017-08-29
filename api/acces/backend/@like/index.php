<?php 
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');

session_start();
$perintah = new CORE();


	$postid = $_POST['id'];
	$userid = $_SESSION['id'];
	$date = date('Y-m-d H:i:s');
	

	$result = $perintah->getDB()->query("INSERT INTO post_like SET postid = '$postid', userid = '$userid', date = '$date'");
	if ($result) {

		echo "<script>alert('berhasil')</script>";

	}
	