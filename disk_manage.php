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

    <!--datatable js-->

    <script src="dist/js/jquery.dataTables.min.js"></script> 
    
    <style>
      body{
        padding-top: 50px; 
      }
      .pan{
        border-radius:10px;
        padding-top: 50px;
      }
    </style>

  </head>

  <body>

    <!--Navbar-->

    <?php include("navbar.php");?>

    <div class="container col-md-8 col-md-offset-2 pan">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Safe Disk Menage</h3>
        </div>
        <table class="table table-hover table-bordered table-responsive" id="table_id">
          <thead class="thead-default">
            <tr>
              <th>#</th>
              <th>Data</th>
              <th>Url</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
    

    <script type="text/javascript" charset="utf-8">
      
      $(document).ready(function() {
        $('#table_id').dataTable();
      });

    </script>

  </body>
</html>

