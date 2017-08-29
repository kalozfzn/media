<?php 

    $sessionid      = $_SESSION['id'];
    $status = $perintah->getUserType($sessionid);
    
  if ($_SESSION['id'] == "") {

        $perintah->getRedirect("");

    } 
      else if ($status == "user") {

          $perintah->getRedirect("");

      }
 ?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from foxythemes.net/preview/products/maisonnette/tables-datatables.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Aug 2017 02:44:05 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php echo MED_BASE_BACKEND; ?>
    <title>Maisonnette</title>
    <link rel="stylesheet" type="text/css" href="asset/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="asset/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="asset/lib/theme-switcher/theme-switcher.min.css"/>
    <link rel="stylesheet" type="text/css" href="asset/lib/datatables/css/dataTables.bootstrap4.min.css"/><link type="text/css" href="asset/css/app.css" rel="stylesheet">  
    <link rel="stylesheet" type="text/css" href="asset/css/loading.css">

    </head>
  <body>
  <?php include 'public/backend/admin/_fragment/header.php'; ?>
  <div class="loading" style="display: none;">Loading&#8230;</div>
      <div class="main-content container" style="margin-top: 3%;">    
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default panel-table">
              <div class="panel-heading text-center">Data User</div>
              <div class="panel-body">
              <table id="table3" class="table table-striped table-hover table-fw-widget">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Tanggal Daftar</th>
                      <th>Foto</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="result"></div>
    <script src="asset/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="asset/lib/tether/js/tether.min.js" type="text/javascript"></script>
    <script src="asset/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="asset/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="asset/js/app.js" type="text/javascript"></script>
    <script src="asset/lib/theme-switcher/theme-switcher.min.js" type="text/javascript"></script>
    <script src="asset/lib/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="asset/lib/datatables/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <script src="asset/lib/datatables/plugins/buttons/js/dataTables.buttons.js" type="text/javascript"></script>
    <script src="asset/lib/datatables/plugins/buttons/js/buttons.html5.js" type="text/javascript"></script>
    <script src="asset/lib/datatables/plugins/buttons/js/buttons.flash.js" type="text/javascript"></script>
    <script src="asset/lib/datatables/plugins/buttons/js/buttons.print.js" type="text/javascript"></script>
    <script src="asset/lib/datatables/plugins/buttons/js/buttons.colVis.js" type="text/javascript"></script>
    <script src="asset/lib/datatables/plugins/buttons/js/buttons.bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        App.init();
        App.dataTables();
        App.livePreview();
        display();
      });

      $(document).on("click", "#delete", function(){

        var dataid = $(this).attr('data-script');
        $(".loading").show();

        $.ajax({
            url: '<?php echo MED_API;?>/acces/backend/@deleteuser/index.php',
            type: 'POST',
            data: {id : dataid},
            success: function(data) {
              display();
              $(".loading").fadeOut(200);
                $('#result').html(data);
            }
        });
        return false;
    });
      function display() {
        $.ajax({
            url:"<?php echo MED_API; ?>/acces/backend/@loaduser/index.php",
            type: "POST",
            async: false,
            data:{
              "display" : 1
            },
            success: function(d){
              $("tbody").html(d);
            }
          });
      }
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

<!-- Mirrored from foxythemes.net/preview/products/maisonnette/tables-datatables.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Aug 2017 02:44:12 GMT -->
</html>