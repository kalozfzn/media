<?php 
	$sessionid      = $_SESSION['id'];
    $image          = $perintah->getUserFoto($sessionid);
    $username       = $perintah->getUsername($sessionid);
 ?>
<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css">
	<?php echo MED_BASE_FRONTEND; ?>
	<link rel="stylesheet" type="text/css" href="asset/css/loading.css">
<head>
	<title>Change</title>
</head>
<body>
<?php include 'public/backend/user/_fragment/index.php'; ?>
<div class="loading" style="display: none;">Loading&#8230;</div>
<form method="post" id="change">
	<div class="container" style="box-shadow: 1px 1px 3px 3px hsl(0, 0%, 80%);margin-top: 3%;">
		<div class="card">
			<div class="card-content">
			  <nav class="panel">
			  <p class="panel-heading has-text-center">
				Change Profile <i class="fa fa-edit" style="font-size: 130%;"></i>
			  </p>
			  </nav>
			  <div class="field">
				  <label class="label">Username</label>
				  <div class="control has-icons-left has-icons-right">
				    <input class="input" type="text" placeholder="Username Sekarang" value="<?php echo $username; ?>">
				    <span class="icon is-small is-left">
				      <i class="fa fa-lock"></i>
				    </span>
				    <span class="icon is-small is-right">
				      <i class="fa fa-eye"></i>
				    </span>
				  </div>
				</div>
				<label class="label">New Username</label>
				  <div class="control has-icons-left has-icons-right">
				    <input type="text" class="input" name="username" type="password" placeholder="Username Baru ...">
				    <span class="icon is-small is-left">
				      <i class="fa fa-lock"></i>
				    </span>
				    <span class="icon is-small is-right">
				      <i class="fa fa-eye"></i>
				    </span>
				  </div>
				  <br>

				  <div class="column">
				  	<div class="columns" style="margin-left: 25%;">
				  		<div class="card">
						  <div class="card-image">
						    <figure class="image is-4by3">
						      <img src="<?php echo MED_IMAGE ?>1920_1080/<?php echo $image; ?>" alt="Image">
						    </figure>
						  </div>
						  <div class="card-content">
						    <div class="content">
						    	<button class="button is-primary" disabled>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;Foto anda saat ini&nbsp;&nbsp;&nbsp;</button>
						    </div>
						  </div> 
						</div>
						<div class="card" style="margin-left: 3%;">
						  <div class="card-image">
						    <figure class="image is-4by3">
						      <img id="blah" src="http://bulma.io/images/placeholders/1280x960.png" alt="Image">
						    </figure>
						  </div>
						  <div class="card-content">
						    <div class="content">
								<div class="field">
								  <div class="file is-primary">
								    <label class="file-label">
								      <input onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="file-input" type="file" name="resume">
								      <span class="file-cta">
								        <span class="file-icon">
								          <i class="fa fa-upload"></i>
								        </span>
								        <span class="file-label">
								          Pilih foto dari galery
								        </span>
								      </span>
								    </label>
								  </div>
								</div>
						    </div>
						  </div>
						</div>

				  	</div>
				  </div>

				    <div class="field is-grouped is-grouped-right" style="margin-top: 2%;">
					  <p class="control is-expanded">
					    <button type="submit" class="button is-primary" style="width: 100%;">
					      Simpan Perubahan <i class="fa fa-check"></i>
					    </button>
					  </p>
					  <p class="control is-expanded">
					    <a class="button is-light" style="width: 100%;">
					      Batal&nbsp;&nbsp;<i class="fa fa-close"></i>
					    </a>
					  </p>
					</div>
				  </div>
				</div>
			</div>
			</form>
		</div>
	</div>
		<div id="result"></div>
    	<script src="asset/js/jquery.min.js" type="text/javascript"></script>
    	<script type="text/javascript">
    		$('#change').submit(function(){
        
		        $('.loading').show(); 
		        $.ajax({
		            url: '<?php echo MED_API; ?>/acces/backend/@changeprofile/index.php',
		            type: 'POST',
		            data: new FormData(this),
		            contentType: false,
		            cache: false,
		            processData:false,
		            success: function(data) {
		                $('#result').html(data);
		                $('.loading').fadeOut();
		                }
		        });
		        return false;
		    });	
    	</script>
</body>
</html>