<?php 
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');

session_start();
$perintah = new CORE();

	
	$sessionid = $_SESSION['id'];
	$old = $perintah->AntiInjection($_POST['oldpas']);
	$new = $perintah->AntiInjection($_POST['newpas']);
	$new2 = $perintah->AntiInjection($_POST['newpas2']);

	$sql = $perintah->getDB()->query("SELECT userid, password FROM user WHERE userid = '$sessionid'");
	$result = $sql->fetch_object();

	if ($result->password <> $old) {
		echo "<script>alert('password salah')</script>";
	} 

			else {

				if ($new <>  $new2) {

					echo "<script>alert('password tidak sama')</script>";

				} 
					else{

						$perintah->getDB()->query("UPDATE user SET password = '$new' WHERE userid = '$sessionid'");
						$perintah->getRedirect("beranda");

					}

			}