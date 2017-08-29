<?php 
require('../../../../core/static/frontend/asset/lib/class.upload.php');
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');

session_start();
$perintah = new CORE();

	$sessionid = $_SESSION['id'];
	$username = $perintah->AntiInjection($_POST['username']);
	$files = $_FILES['resume'];

	$upload = $perintah->upload($files);

	if (empty($username)) {

		echo "<script>alert('data kosong')</script>";

	} 	
		else {

			$sql = $perintah->getDB()->query("UPDATE user SET username = '$username', foto = '$upload' WHERE userid = '$sessionid'");
			if ($sql) {
				$perintah->getRedirect("beranda");
			}

		}