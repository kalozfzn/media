<?php

$MAIN_URL        = "http://localhost/eresto/@media/core/";
$MAIN_URL        = rtrim($MAIN_URL,'/\\');

$API_URL        = "http://localhost/eresto/@media/api/";
$API_URL        = rtrim($API_URL,'/\\');


define ('MED_URL',$MAIN_URL);
define ('MED_API',$API_URL);
define ('MED_IMAGE',$MAIN_URL.'/static/upload/');

define ('MED_PASSWORD_HASH','$2a$07$aYdd86nQz81ITkdKIxzerfaek4l0za50oLVDW$');


define('MED_BASE_FRONTEND', '<base href="'.MED_URL.'/static/frontend/" />');
define('MED_BASE_BACKEND', '<base href="'.MED_URL.'/static/backend/" />');

define ('MED_HOST','localhost');
define ('MED_USER','root');
define ('MED_PASS','');
define ('MED_DBNM','media');

date_default_timezone_set('Asia/Jakarta');

error_reporting(0);
?>