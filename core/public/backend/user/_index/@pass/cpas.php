<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css">
<head>
	<title>Password</title>
	<?php echo MED_BASE_FRONTEND; ?>
	<link rel="stylesheet" type="text/css" href="asset/css/loading.css">
</head>
<body>
<?php include 'public/backend/user/_fragment/index.php'; ?>
<div class="loading" style="display: none;">Loading&#8230;</div>
<form method="post" id="changepas">
	<div class="container" style="box-shadow: 1px 1px 3px 3px hsl(0, 0%, 80%);margin-top: 3%;">
		<div class="card">
			<div class="card-content">
			  <nav class="panel">
			  <p class="panel-heading has-text-center">
				Change Password <i class="fa fa-lock"></i>
			  </p>
			  </nav>
			  <div class="field">
				  <label class="label">Old Password</label>
				  <div class="control has-icons-left has-icons-right">
				    <input name="oldpas" class="input" type="password" placeholder="Input Password...">
				    <span class="icon is-small is-left">
				      <i class="fa fa-lock"></i>
				    </span>
				    <span class="icon is-small is-right">
				      <i class="fa fa-eye"></i>
				    </span>
				  </div>
				</div>
				<label class="label">New Password</label>
				  <div class="control has-icons-left has-icons-right">
				    <input name="newpas" class="input" type="password" placeholder="Input Password...">
				    <span class="icon is-small is-left">
				      <i class="fa fa-lock"></i>
				    </span>
				    <span class="icon is-small is-right">
				      <i class="fa fa-eye"></i>
				    </span>
				  </div>
				  <label class="label">Retype New Password</label>
				  <div class="control has-icons-left has-icons-right">
				    <input name="newpas2" class="input" type="password" placeholder="Input Password...">
				    <span class="icon is-small is-left">
				      <i class="fa fa-lock"></i>
				    </span>
				    <span class="icon is-small is-right">
				      <i class="fa fa-eye"></i>
				    </span>
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
		</div>
		</form>
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
	$('#changepas').submit(function(){
		$('.loading').show();
        $.ajax({
            url: '<?php echo MED_API; ?>/acces/backend/@changepas/index.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data) {
                $('#result').html(data);
                $('.loading').fadeOut(100);
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
	</script>
</body>
</html>