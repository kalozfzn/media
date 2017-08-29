<?php

    if ($_SESSION['id'] == "") {

        $perintah->getRedirect("");

    }

    $sessionid      = $_SESSION['id'];
    $image          = $perintah->getUserFoto($sessionid);
    $username       = $perintah->getUsername($sessionid);


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Berandanya</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css">
    <?php echo MED_BASE_FRONTEND; ?>
</head>
<body>
    <?php include 'public/backend/user/_fragment/index.php'; ?>
	<div class="row">
	<div class="container" style="margin-top: 2%;">
		<div class="columns">
			<div class="column is-one-quarter is-centered" style="">
				<div class="card" style="box-shadow: 1px 1px 3px 3px hsl(0, 0%, 65%);">
					  <div class="card-image" style="box-shadow: 1px 1px 3px 3px hsl(0, 0%, 80%);">
					    <figure class="image is-2by2">
					      <img src="<?php echo MED_IMAGE ?>1920_1080/<?php echo $image; ?>" alt="Image">
					    </figure>
					  </div>
					  <div class="card-content">
					    <div class="media">
					      <div class="media-content">
					        <p class="title is-4"><?php echo $username; ?></p>
					      </div>
					    </div>

					    <div class="content">
					      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					      Phasellus nec iaculis mauris. <a>@bulmaio</a>.
					      <a>#css</a> <a>#responsive</a>
					      <br>
					      <small>11:09 PM - 1 Jan 2016</small>
					    </div>
					  </div>
					</div>
			</div>
			
			<div class="column auto">
				<div class="column" style="box-shadow: 1px 1px 3px 3px hsl(0, 0%, 80%);">
					<div class="card" style="margin-bottom: 6%;">
					<form method="post" id="post">
						<div class="content">
							<div class="control">
							  <textarea name="status" id="status" class="textarea is-focused" type="text" placeholder="Apa yang anda pikirkan..."></textarea>
							</div>
						</div>
					<button type="submit" class="button is-primary" style="float: right;margin-top: -2%;">Kirim&nbsp;&nbsp;<i class="fa fa-send" style="font-size: 95%;"></i></button>
					</form>
					</div>	
				</div>
				
				<?php 
		            $post = $perintah->getDB()->query("SELECT postid,userid,content, date FROM post WHERE userid IN(SELECT idfriend FROM friend WHERE userid = '$sessionid' ) OR userid = '$sessionid' ORDER BY date DESC LIMIT 10");
	
		            		while ($pos = $post->fetch_object()) {
		                        $iduserpos = $pos->userid;

		                        $idpos = $pos->postid;

		                        $getUsername2    = $perintah->getUsername($iduserpos);

		                        $image2  = $perintah->getUserFoto($iduserpos);

		                        $count = $perintah->getDB()->query("SELECT COUNT(postlikeid) AS countlike FROM post_like  WHERE postid = '$idpos'");
		                        
		                        $countlike = $count->fetch_object();

            		 ?>

				<div class="card" style="margin-top: 2%;box-shadow: 1px 1px 3px 3px hsl(0, 0%, 80%);">
					<div class="card-content">
						<article class="media">
						  <figure class="media-left">
						    <p class="image is-64x64">
						      <img src="<?php echo MED_IMAGE ?>300/<?php echo $image2; ?>">
						    </p>
						  </figure>
						  <div class="media-content">
						    <div class="content">
						      <p>
						        <a href="<?php echo MED_URL; ?>/profile/<?php echo $getUsername2; ?>"><strong><?php echo $getUsername2; ?></strong> <small>31m</small></a>
						        <br>
						        <?php echo $pos->content; ?></a>
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
						        <a class="level-item" href="Javascript:void(0)" id="like" data-script="<?php echo $pos->postid; ?>">
						          <span class="icon is-small"><i class="fa fa-thumbs-o-up"></i></span>
						          Like
						        </a>
						        <?php } else { ?>
						        <a  class="level-item" href="Javascript:void(0)" id="disslike" data-script="<?php echo $pos->postid; ?>">
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
								            <a href="<?php echo MED_URL; ?>/profile/<?php echo $getUsername3; ?>"><strong><?php echo $getUsername3; ?></strong></a>
								            <br>
								            <?php echo $comment->comment; ?></a>
								            <br>
								          </p>
								        </div>
							        </div>
						        </div>
						  </div>
						  <?php 

						  	}
						   ?>
						</article>
						<form method="post" id="comment">
						<article class="media">
						  <figure class="media-left">
						    <p class="image is-64x64">
						      <img src="<?php echo MED_IMAGE ?>150/<?php echo $image; ?>">
						    </p>
						  </figure>
						  
						  	<div class="media-content">
						    <div class="field">
						      <p class="control">
						        <textarea name="comment" id="txtcomment" class="textarea" placeholder="Tambahkan Komentar..."></textarea>
						      </p>
						    </div>
						    <input type="hidden" name="id" value="<?php echo $pos->postid; ?>">
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
	</div>
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
    $(document).on("click", "#allow", function(){

        var dataid = $(this).attr('data-script');
        

        $.ajax({
            url: '<?php echo MED_API;?>/acces/backend/@allow/index.php',
            type: 'POST',
            data: {id : dataid},
            success: function(data) {
                $('#result').html(data);
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