<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php echo MED_BASE_FRONTEND; ?>
	<link rel="stylesheet" type="text/css" href="asset/css/loading.css">
    <style type="text/css">
        .commentpost{
            width: 100%;
            height: 100px;
            border-bottom: 2px solid black; 
        }
        .commentt{
            width: 100%;
            border-bottom: 2px solid black; 
        }
    </style>
</head>
<body>
 <div class="loading" style="display: none;">Loading&#8230;</div>
<form method="post" id="cobaan">
<input type="text" name="comment">
<input type="submit" name=" kal">
</form>	
<div class="commentt"></div>
<script src="asset/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    fungsidisplay();
    fungsi();

});
	$('#cobaan').submit(function(){
        $.ajax({
            url: '<?php echo MED_API; ?>/acces/backend/@comment/index.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data) {
            	fungsi();
                }
        });
        return false;
    });
    function fungsi(){
        
        $.ajax({
            type: 'GET',
            url:"<?php echo MED_API; ?>/acces/backend/@load/index.php",
            data:{ 
                'off':0
                
            },
            success: function(data){
                
                $('.commentt').html(data);
            }
        });

    }
    function fungsidisplay(){
        var flag = 0;
        $(".loading").show(500);
    $.ajax({
        type: 'GET',
        url:"<?php echo MED_API; ?>/acces/backend/@load/index.php",
        data:{ 
            'offset':0,
            'limit' : 7
        },
        success: function(data){
            $(".loading").hide();
            $('.commentt').append(data);
            flag +=3;
        }
    });

    $(window).scroll(function(){
        if ($(window).scrollTop() >= $(document).height() - $(window).height()) {
            $(".loading").show();
            $.ajax({
                type: 'GET',
                url:"<?php echo MED_API; ?>/acces/backend/@load/index.php",
                data:{ 
                    'offset':flag,
                    'limit' : 3
                },
                success: function(data){
                    $(".loading").hide(300);
                    $('.commentt').append(data);
                    flag +=3;
                }
            });
        }
    });
    	
    }

</script>
</body>
</html>