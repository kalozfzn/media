<?php 
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');

session_start();
$perintah = new CORE();

	$userid = $_SESSION['id'];
	$comment = $perintah->AntiInjection($_POST['comment']);
	$date = date('Y-m-d H:i:s');

	$result = $perintah->getDB()->query("INSERT INTO post_comment SET postid = '$postid', userid = '$userid',comment = '$comment', date = '$date'");
