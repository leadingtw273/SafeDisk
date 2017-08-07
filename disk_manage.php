<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="dist/images/usb_icon.png">

    <title>SafeDisk</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="dist/plug/sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/jquery.dataTables.min.css">
    
    <style>
      body{
        padding-top: 50px; 
      }
      .tt{
        border-radius:10px;
        font-size: 20px;
      }
    </style>

  </head>

  <body>

    <!--Navbar-->

    <?php include("navbar.php");?>

    <div class="container">
        <div>
          <h3>Safe Disk Menage</h3>
        </div>
        <table class="tt table table-hover table-bordered table-responsive" id="table_id">
          <thead >
            <tr>
              <th class="col-xs-1 col-md-1 text-center">#</th>
              <th class="col-xs-2 col-md-2 text-center">Key</th>
              <th class="col-xs-4 col-md-4 text-center">Url</th>
              <th class="col-xs-2 col-md-2 text-center">SendEmail</th>
              <th class="col-xs-2 col-md-2 text-center">QRcode</th>
            </tr>
          </thead>
        </table>
    </div>
    

    <script type="text/javascript" charset="utf-8">
      
      $(document).ready(function() {
        var opt={
          "paging": false,
          "info":     false,
          "bFilter": false,
          "ajax":"dist/sqlFunction/table_list_data.php"
        };
        $('#table_id').dataTable(opt);
      });

      $(".tt").on('click', '.send', function() {
        var sent_url = $(this).data("url");
        $.ajax({
          type: "POST",
          url: "http://127.0.0.1/SafeDisk/emailSenter.php",
          dataType:'text',
          async:false,
          data: {senter : sent_url},
          success: function(msg){
          if(msg == '1'){
            swal(
              "Sent Success",
              "already sent!",
              "success"
            );
          }
        }
      })
      });

      $(".tt").on('click', '.qr', function() {
        $(".btn").prop('disabled',true);
        var qr_url = $(this).data("url");
        swal({
          title: 'QR code',
          text: 'Scan and download',
          imageUrl: 'http://chart.apis.google.com/chart?cht=qr&chl='+ qr_url +'&chs=160x160&chld=L|0',
          animation: false
        },
            function(){
              $(".btn").prop('disabled',false);
            })
      });

    </script>

  </body>
</html>

