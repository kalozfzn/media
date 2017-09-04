<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from foxythemes.net/preview/products/maisonnette/pages-blank.php?theme=orange-juice by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Aug 2017 02:49:03 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php echo MED_BASE_BACKEND; ?>
    <link rel="shortcut icon" href="asset/img/favicon.html">
    <title>Maisonnette</title>
    <link rel="stylesheet" type="text/css" href="asset/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="asset/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="asset/lib/theme-switcher/theme-switcher.min.css"/><link type="text/css" href="asset/css/themes/orange-juice.css" rel="stylesheet">  
    <style type="text/css">
      .loadmore{
        width: 50px;
        height: 50px;
        border-radius: 50px;
        border: 5px dashed black;
        margin-left: 45%;

        animation: mantul 2.5s linear infinite;
      }
      @keyframes mantul{
        from{
          transform: rotateX(0deg);
        }
        to{
          transform: rotate(400deg);
        }
      }

    </style>
    </head>

  <body>
      <div class="main-content container">
        <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <form method="post" id="kirim">
                  <div class="form-group row">
                    <div class="col-12">
                      <textarea class="form-control" name="message" id="message" rows="6"></textarea>
                      <br>
                      <button type="submit" class="btn btn-info" style="float:right;"><i class="icon icon-left s7-paper-plane"></i><strong>Kirim</strong></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div id="result"></div>
          
          <div class="loadmore" style="display: none;"></div>
          
        </div>
  </body>

  <script src="asset/lib/jquery/jquery.min.js" type="text/javascript"></script>
  <script src="asset/lib/tether/js/tether.min.js" type="text/javascript"></script>
  <script src="asset/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
  <script src="asset/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="asset/js/app.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      App.init();
      display();
      
      
      
      
      
    });
    function display(){
        
        $.ajax({
            type: 'GET',
            url:"<?php echo MED_API; ?>/acces/backend/@loadchat/index.php",
            data:{ 
                'off':0
                
            },
            success: function(data){
                
                $('#result').html(data);
            }
        });

    }
    $('#kirim').submit(function(){
      $.ajax({
        type: 'POST',
        url:"<?php echo MED_API; ?>/acces/backend/@chat/index.php",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success:function(data){
          document.getElementById('message').value = "";
          display();

        }

      });
      return false;

    });
    function fungsidisplay(){
        var flag = 0;
        
    $.ajax({
        type: 'GET',
        url:"<?php echo MED_API; ?>/acces/backend/@loadchat/index.php",
        data:{ 
            'offset':0,
            'limit' : 2
        },
        success: function(data){
            
            $('#result').append(data);
            flag +=3;
        }
    });

    $(window).scroll(function(){
        if ($(window).scrollTop() >= $(document).height() - $(window).height()) {
            
            $.ajax({
                type: 'GET',
                url:"<?php echo MED_API; ?>/acces/backend/@loadchat/index.php",
                data:{ 
                    'offset':flag,
                    'limit' : 3
                },
                success: function(data){
                    
                    $('#result').append(data);
                    flag +=3;
                }
            });
        }
    });
      
    }

  </script>
</html>
