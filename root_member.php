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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.0/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/auto.css">

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
    <?php include("page_footer.php");?>

    <!--JavaScript=====================================================================-->
    <script type="text/javascript" charset="utf-8">

      //Table Read
      $(document).ready(function() {
        var opt={
          "ajax":"dist/sqlFunction/root_member_list.php"
        };
        $('#table_id').dataTable(opt);
      });
      
    </script>
  </body>
</html>

