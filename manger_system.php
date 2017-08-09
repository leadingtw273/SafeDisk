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
    <link rel="stylesheet" type="text/css" href="dist/plug/sweetalert2/dist/sweetalert2.css">
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
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
    <?php include("navbar.php");?>

    <!--Table-->
    <div class="container table-responsive">
        <div>
          <h2>User Menage</h2>
        </div>
        <table class="css_table table_class table table-striped table-bordered table-responsive" id="table_id">
          <thead>
            <tr>
              <th class="col-xs-1 col-md-1 text-center">#</th>
              <th class="col-xs-2 col-md-2 text-center">User</th>
              <th class="col-xs-4 col-md-4 text-center">Email</th>
              <th class="col-xs-2 col-md-2 text-center">Phone</th>
            </tr>
          </thead>
        </table>
    </div>

    <!--footer-->
    <?php include("footer.php");?>

    <!--JavaScript=====================================================================-->
    <script type="text/javascript" charset="utf-8">

      //Table Read
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

