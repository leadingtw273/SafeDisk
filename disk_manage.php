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
        padding-top: 50px;
      }
    </style>

  </head>

  <body>

    <!--Navbar-->

    <?php include("navbar.php");?>

    <div class="container">
        <div class="tt center">
          <h3>Safe Disk Menage</h3>
        </div>
        <table class="table table-hover table-bordered table-responsive" id="table_id">
          <thead >
            <tr>
              <th class="col-xs-2 col-md-2">#</th>
              <th class="col-xs-3 col-md-3">Key</th>
              <th class="col-xs-5 col-md-5">Url</th>
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

    </script>

  </body>
</html>

