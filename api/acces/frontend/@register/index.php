<?php 
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');

	session_start();
	$perintah = new CORE();

	$username = $perintah->AntiInjection($_POST['username']);
	$password = $perintah->AntiInjection($_POST['password']);
	$email = $perintah->AntiInjection($_POST['email']);
	$_SESSION['username'] = $username;

	$cek = $perintah->getDB()->query("SELECT username,password,email FROM user WHERE username = '$username' LIMIT 1");

	$cek = $cek->fetch_row();


	if (empty($username) or empty($password) or  empty($email)) {
		echo "<script>alert('data tidak boleh kosong')</script>";
		
	} 

		else {
				if ($username == $cek[0] or $password == $cek[2]) {

					echo "<script>alert('data sudah dipakai')</script>";

				}
					else {

						$key = " ";
						$cari = stristr($username,$key);

						if ($cari) {

							echo "<script>alert('Tidak Boleh Ada Spasi')</script>";

						} 
							else{
								$date = date('Y-m-d H:i:s');

								$register = $perintah->getDB()->query("INSERT INTO user SET userid = null, username = '$username', password = '$password', email = '$email',date = '$date', usertype = 'user'");

									if ($register) {
										$perintah->getRedirect("pict");
										
										
									} 
										else{

											echo "<script>alert('gagal')</script>";
										}

							}


					}




		}
	







	
	