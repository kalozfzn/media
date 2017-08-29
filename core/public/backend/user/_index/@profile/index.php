<?php 
	if ($_SESSION['id'] == "") {

        $perintah->getRedirect("");

    }

    $get      = $_GET['U2'];
    $sessionid = $_SESSION['id'];
    $sql = $perintah->getDB()->query("SELECT userid, username, foto FROM user WHERE username ='$get' ");
    $getid = $sql->fetch_object();
    $id = $getid->userid;


    $guest = $perintah->getUserFoto($sessionid);
    $imag = $perintah->getUserFoto($id);
 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css">
	<?php echo MED_BASE_FRONTEND; ?>
	<link rel="stylesheet" type="text/css" href="asset/css/loading.css">

<body>
<?php include 'public/backend/user/_fragment/index.php'; ?>
<div class="loading" style="display: none;">Loading&#8230;</div>
	<section class="hero is-medium is-info has-text-right is-size-2">
	  <div class="container">
	  <div class="hero-body"></div>
	  <div class="hero-title">
		 <?php echo $getid->username; ?>&nbsp;&nbsp;&nbsp;
	  </div>
	  </div>
	</section>
		<!-- <div class="row">
		<div class="container" style="margin-bottom: 1%;">
		<div class="card is has-text-right">
				<div>
				<button class="button is-primary" style="margin-right: 1%;margin-top: 0.5%;margin-bottom: 0.5%;">
					Galery&nbsp;&nbsp;<i class="fa fa-camera" style="font-size: 90%;"></i>
				</button>
		</div>
		</div> -->
	<div class="container" style="margin-top: -10%;">
		<div class="columns">			
			<div class="column is-one-quarter is-centered">
				<div class="card">
					  <div class="card-image" style="box-shadow: 1px 1px 3px 3px hsl(0, 0%, 80%);">
					    <figure class="image is-2by2">
					      <img src="<?php echo MED_IMAGE ?>300/<?php echo $getid->foto; ?>" alt="Image">
					    </figure>
					  </div>
					  
				</div>
			</div>
		</div>
		
		<div class="row">
			<form method="post" id="post">
				<div class="container" style="margin-top: -15%;">
				<div class="columns">
					<div class="column is-one-quarter is-centered">
					</div>
					<?php if ($id == $sessionid) {
							
						?>
					<div class="column auto">
						<div class="column" style="box-shadow: 1px 1px 2px 2px hsl(0, 0%, 80%);margin-bottom: 2%;">
							<a href="" class="button is-primary">Galery&nbsp;&nbsp;<i class="fa fa-camera" style=""></i></a>
							<a href="<?php echo MED_URL; ?>/changeprofile" class="button is-primary">EditProfile&nbsp;&nbsp;<i class="fa fa-users"></i></a>
							<a href="<?php echo MED_URL; ?>/changepass" class="button is-primary">EditPassword&nbsp;&nbsp;<i class="fa fa-lock"></i></a>
							
						</div>
						<?php } ?>
						<div class="column" style="box-shadow: 1px 1px 3px 3px hsl(0, 0%, 80%);">
							<div class="card" style="margin-bottom: 6%;">
								<div class="content">
									<div class="control">
									  <textarea name="status" id="status" class="textarea is-focused" type="text" placeholder="Apa yang anda pikirkan..."></textarea>
									</div>
								</div>
							<button type="submit" class="button is-primary" style="float: right;margin-top: -2%;">Kirim&nbsp;&nbsp;<i class="fa fa-send" style="font-size: 95%;"></i></button>
							</div>	
						</div>
					</div>	
				</div>
			</div>
			</form>
			<?php 
				$postsql = $perintah->getDB()->query("SELECT postid,userid,content, date FROM post WHERE userid = '$id' ORDER BY date DESC LIMIT 10");
						while ($post = $postsql->fetch_object()) {
							$idpos = $post->postid;
					
			 ?>
			<div class="card" style="margin-top: 2%;box-shadow: 1px 1px 3px 3px hsl(0, 0%, 80%);">
					<div class="card-content">
						<article class="media">
						  <figure class="media-left">
						    <p class="image is-64x64">
						      <img src="<?php echo MED_IMAGE ?>300/<?php echo $getid->foto; ?>">
						    </p>
						  </figure>
						  <div class="media-content">
						    <div class="content">
						      <p>
						        <strong><?php echo $getid->username; ?></strong> <small>31m</small>
						        <br>
						        <?php echo $post->content; ?>
						      </p>
						    </div>
						    <nav class="level is-mobile">
						      <div class="level-left">
						        <a class="level-item">
						          <span class="icon is-small"><i class="fa fa-comments-o"></i></span>
						          Comments
						        </a>
						        <?php 
						        	$likesql = $perintah->getDB()->query("SELECT postid, userid FROM post_like WHERE postid = '$idpos' AND userid = '$sessionid' LIMIT 1");

						        	$like = $likesql->fetch_row();
						        	if (!$like[0]) {
						         ?>
						        <a class="level-item" href="Javascript:void(0)" id="like" data-script="<?php echo $post->postid; ?>">
						          <span class="icon is-small"><i class="fa fa-thumbs-o-up"></i></span>
						          Like
						        </a>
						        <?php } else { ?>
						        <a  class="level-item" href="Javascript:void(0)" id="disslike" data-script="<?php echo $post->postid; ?>">
						          <span class="icon is-small"><i class="fa fa-thumbs-up"></i></span>
						          Dislike
						        </a>
						        <?php } ?>
						      </div>
						    </nav>
						    <?php 
						    	$commentsql = $perintah->getDB()->query("SELECT postid, userid, comment, date FROM post_comment WHERE postid = '$idpos'");

						    	while ($comment = $commentsql->fetch_object()) {
						    		$getUsername3 = $perintah->getUsername($comment->userid);
						    		$image3 = $perintah->getUserFoto($comment->userid);
						     ?>
						    <div class="card">
							    <div class="card-content">
								    <article class="media" style="margin: -2%;">
								      <figure class="media-left">
								        <p class="image is-48x48">
								          <img src="<?php echo MED_IMAGE ?>300/<?php echo $image3; ?>">
								        </p>
								      </figure>
								      <div class="media-content">
								        <div class="content">
								          <p>
								            <strong><?php echo $getUsername3; ?></strong>
								            <br>
								            <?php echo $comment->comment; ?></a>
								            <br>
								          </p>
								        </div>
							        </div>
						        </div>
						  </div>
						  <?php } ?>
						  <form method="post" id="comment">
						</article>
						<article class="media">
						  <figure class="media-left">
						    <p class="image is-64x64">
						      <img src="<?php echo MED_IMAGE ?>300/<?php echo $guest; ?>">
						    </p>
						  </figure>
						  <div class="media-content">
						    <div class="field">
						      <p class="control">
						        <textarea name="comment" id="txtcomment" class="textarea" placeholder="Tambahkan Komentar..."></textarea>
						      </p>
						    </div>
						    <input type="hidden" name="id" value="<?php echo $post->postid; ?>">
						    <button type="submit" class="button is-primary" style="float: right;">Kirim&nbsp;&nbsp;<i class="fa fa-send" style="font-size: 95%;"></i></button>
						  </div>
						<hr>
						</article>
						</form>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div id="result"></div>
    	<script src="asset/js/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$('#post').submit(function(){
        
		        $('.loading').show(); 
		        $.ajax({
		            url: '<?php echo MED_API; ?>/acces/backend/@post/index.php',
		            type: 'POST',
		            data: new FormData(this),
		            contentType: false,
		            cache: false,
		            processData:false,
		            success: function(data) {
		                document.getElementById('status').value = "";
		                $('#result').html(data);
		                $('.loading').fadeOut();
		                }
		        });
		        return false;
		    });
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
			$(document).on("click", "#logout", function(){
				$.ajax({
			        url: '<?php echo MED_API; ?>/acces/backend/@logout/index.php',
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
    		$('#comment').submit(function(){
        
		        $('.loading').show(); 
		        $.ajax({
		            url: '<?php echo MED_API; ?>/acces/backend/@comment/index.php',
		            type: 'POST',
		            data: new FormData(this),
		            contentType: false,
		            cache: false,
		            processData:false,
		            success: function(data) {
		                document.getElementById('txtcomment').value = "";
		                $('#result').html(data);
		                $('.loading').fadeOut();
		                }
		        });
		        return false;
		    });
    		$(document).on("click", "#like", function(){

		        var dataid = $(this).attr('data-script');
		        

		        $.ajax({
		            url: '<?php echo MED_API;?>/acces/backend/@like/index.php',
		            type: 'POST',
		            data: {id : dataid},
		            success: function(data) {
		                $('#result').html(data);
		            }
		        });
		        return false;
		    });

		   $(document).on("click", "#disslike", function(){

		        var dataid = $(this).attr('data-script');
		        

		        $.ajax({
		            url: '<?php echo MED_API;?>/acces/backend/@disslike/index.php',
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