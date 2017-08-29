<?php 
	$sessionid = $_SESSION['id'];
 ?>
<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css">
<head>
	<title>Teman</title>
	<?php echo MED_BASE_FRONTEND; ?>
</head>
<body>
<?php include 'public/backend/user/_fragment/index.php'; ?>
	<div class="container">
		<?php 
			$usernamefriend = $_GET['U2'];
			$friendsql = $perintah->getDB()->query("SELECT userid, username, foto FROM user WHERE username LIKE '%$usernamefriend%' AND userid <> '$sessionid'");

				while ($friend = $friendsql->fetch_object()) {
					$idfriend = $friend->userid;

					$friendcek = $perintah->getDB()->query("SELECT userid, idfriend, status FROM friend WHERE idfriend = 'idfriend'");
					$cek = $friendcek->fetch_object();
		 ?>
		<div class="card" style="box-shadow: 1px 1px 3px 3px hsl(0, 0%, 80%);"">
			<div class="card-content">
				<div class="box">
				  <article class="media">
				    <div class="media-left">
				      <figure class="image is-128x128">
				        <img src="<?php echo MED_IMAGE ?>300/<?php echo $friend->foto; ?>" alt="Image">
				      </figure>
				    </div>
				    <div class="media-content">
				      <div class="content">
				        <p>
				          <a href="<?php echo MED_URL; ?>/profile/<?php echo $friend->username; ?>"><strong class="is-size-3"><?php echo $friend->username; ?></strong></a>
				        </p>
				        <?php 
				        	if (empty($cek->idfriend)) {
				         ?>
				        <a href="Javascript:void(0)" id="add" data-script="<?php echo $friend->userid; ?>" class="button is-primary">Tambah teman&nbsp;<i class="fa fa-plus"></i></a>
				        <?php } else if ($cek->status == 1) {	
				         ?>
				        <button class="button is-info">Telah Berteman&nbsp;<i class="fa fa-check"></i></button>
				        <?php 
				        	} else if ($cek->status == 0) {
				         ?>
				        <button class="button is-default">Permintaan sedang dikirim&nbsp;<i class="fa fa-spin fa-circle-o-notch"></i></button>
				        <?php } ?>
				      	
				      </div>
				    </div>
				  </article>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<div id="result"></div>
	<script src="asset/js/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$('#pencarian').submit(function(){
        $.ajax({
            url: '<?php echo MED_API; ?>/acces/backend/@pencarian/index.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data) {
                $('#result').html(data);
                }
        });
        return false;
    });
	$(document).on("click", "#add", function(){

        var dataid = $(this).attr('data-script');
        

        $.ajax({
            url: '<?php echo MED_API;?>/acces/backend/@addfriend/index.php',
            type: 'POST',
            data: {id : dataid},
            success: function(data) {
                $('#result').html(data);
            }
        });
        return false;
    });
	</script>
</body>
</html>