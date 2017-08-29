<?php 
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');

session_start();
$perintah = new CORE();
	$pencarian = $perintah->AntiInjection($_POST['pencarian']);

	$perintah->getRedirect("friends/$pencarian");