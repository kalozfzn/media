<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php echo MED_BASE_FRONTEND; ?>
	<meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Sign Up Page - Material Kit by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet" />
    <link href="asset/css/material-kit.css" rel="stylesheet"/>

	<link rel="stylesheet" type="text/css" href="asset/css/loading.css">
</head>
<body>
<div class="loading" style="display: none;">Loading&#8230;</div>
	
    <body class="signup-page">
    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://www.creative-tim.com">Chat On</a>
            </div>

            <div class="collapse navbar-collapse" id="navigation-example">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <!--<a href="https://www.instagram.com/CreativeTimOfficial" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                            Visit Us From <i class="fa fa-instagram"></i>
                        </a>-->
                        <a href="<?php echo MED_URL; ?>/" class="btn btn-primary btn-round">
                             Login <i class="material-icons">account_circle</i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <div class="header header-filter" style="background-image: url('asset/img/city.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                        <div class="card card-signup">
                            <form class="form" id="register" method="post">
                                <div class="header header-primary text-center">
                                    <h4>Ngaran</h4>
                                </div>
                                
                                <div class="content">

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">face</i>
                                        </span>
                                        <input name="username" type="text" class="form-control" placeholder="Username...">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <input type="password" name="password" placeholder="Password..." class="form-control" />
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">mail</i>
                                        </span>
                                        <input type="email" placeholder="Email..." name="email" class="form-control" />
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <input type="submit" name="" class="btn btn-primary" value="Register" style="width: 80%;">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer" style="margin-top: 0%">
                <div class="container">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="http://www.creative-tim.com">
                                    Creative Tim
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright pull-right">
                        &copy; 2017, made by <a href="#" target="_blank">tiluan</a>
                    </div>
                </div>
            </footer>

        </div>

    </div>


<div id="result"></div>
<!--   Core JS Files   -->
    <script src="asset/js/jquery.min.js" type="text/javascript"></script>
    <script src="asset/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="asset/js/material.min.js"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="asset/js/nouislider.min.js" type="text/javascript"></script>

    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="asset/js/bootstrap-datepicker.js" type="text/javascript"></script>

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="asset/js/material-kit.js" type="text/javascript"></script>
	
	<script type="text/javascript">
		$('#register').submit(function(){
  		$('.loading').show();
        $.ajax({
            url: '<?php echo MED_API; ?>/acces/frontend/@register/index.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data) {
                $('#result').html(data);
                <?php echo $_GET['U2']; ?>
                $('.loading').fadeOut(200);
                }
        });
        return false;
    });
	</script>
</body>
</html>