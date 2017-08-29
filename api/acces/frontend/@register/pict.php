<?php
require('../../../../core/static/frontend/asset/lib/class.upload.php');
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');

	session_start();
	$perintah = new CORE();

	$foto = $_FILES['foto'];

	$upload = $perintah->upload($foto);
	$sessionUsername = $_SESSION['username'];

	
		 	$pict = $perintah->getDB()->query("UPDATE user SET foto = '$upload' WHERE username = '$sessionUsername'");
		 	
			 	if ($pict) {
			 		$perintah->getRedirect("");
			 		session_unset();
			 	}

		