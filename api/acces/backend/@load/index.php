<?php 
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');

session_start();
$perintah = new CORE();
$limit = $_GET['limit'];
$offset = $_GET['offset'];
$off = $_GET['off'];

if (isset($limit) || $limit) {
	
$cobasql = $perintah->getDB()->query("SELECT * FROM post_comment ORDER BY postcommentid DESC LIMIT {$limit} OFFSET {$offset}");
	while ($coba = $cobasql->fetch_object()) { ?>

		<div class="commentpost"><?php echo $coba->comment; ?></div>

	<?php }
}

if (isset($off)) {
	$cobasql = $perintah->getDB()->query("SELECT * FROM post_comment ORDER BY postcommentid DESC LIMIT 10");
	while ($coba = $cobasql->fetch_object()) {
	
	 ?>
	 <div class="commentpost"><?php echo $coba->comment; ?></div>
	 <?php } } ?>
		