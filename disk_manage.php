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
    <link rel="stylesheet" type="text/css" href="dist/plug/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/dataTables.bootstrap.min.css">
    <link href="dist/css/auto.css" rel="stylesheet">
    
    <!--CSS-->
    <style>
      .css_table{
        border-radius:10px;
        font-size: 20px;
      }
      td{
        font-size: 32px;
        text-align: center;
      }
    </style>

  </head>

  <body>

    <!--Navbar-->
    <?php include("page_navbar.php");?>

    <!--Table-->
    <div class="container table-responsive">
        <div>
          <h2>Safe Disk Menage</h2>
        </div>
        <table class="css_table table_class table table-striped table-bordered table-responsive" id="table_id">
          <thead>
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

    <!--footer-->
    <?php include("page_footer.php");?>

    
    <!--JavaScript=====================================================================-->
    <script type="text/javascript" charset="utf-8">
      
      //Table Read
      $(document).ready(function() {
        var opt={
          "paging": false,
          "info":    false,
          "bFilter": false,
          "ajax": location.origin+"/dist/sqlFunction/disk_keyList.php"
        };
        $('#table_id').dataTable(opt);
      });

      //Sent Email
      $(".table_class").on('click', '.send', function(){
        var sent_url = $(this).data("url");
        var sent_key = $(this).data("key");

        swal({
          title:'傳送中...',
          allowEscapeKey: false,
          allowOutsideClick: false,
          onOpen: function(){
            $.ajax({
              type: "POST",
              url: mainUrl+"/emailSenter.php",
              dataType:'text',
              async:false,
              data: {sent_url : sent_url,sent_key : sent_key},
              success: function(msg){
                if(msg == '1'){
                  swal(
                    "Sent Success",
                    "already sent!",
                    "success"
                  );
                }else{
                  swal(
                    "Sent Error",
                    "sent faill!",
                    "error"
                  );
                }
              },
              error: function(){
                swal("We found an error in your data.  Please return to home page and try again.", res,"error")
              }
            })
          }
        });
        swal.showLoading();
        
      });

      //Make QRcode
      $(".table").on('click', '.qr', function(){
        var qr_url = $(this).data("url");
        swal({
          title: 'QR code',
          text: 'Scan and download',
          imageUrl: 'http://chart.apis.google.com/chart?cht=qr&chl='+ qr_url +'&chs=160x160&chld=L|0',
          animation: false
        },
          function(){

        });
      });

    </script>

  </body>

</html>

