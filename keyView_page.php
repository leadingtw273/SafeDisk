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
    <link rel="stylesheet" type="text/css" href="dist/css/dataTables.bootstrap.min.css">
    <link href="dist/css/auto.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--CSS-->
    <style>
      .css_table{
        border-radius:10px;
        font-size: 20px;
        background-color: #CCFFFF
      }
      td{
        font-size: 17px;
        text-align: center;
      }
    </style>

  </head>

  <body background="dist/images/keyviwe.jpg">

    <!--Navbar-->
    <?php include("navbar.php");?>

    <!--Table-->
    <div class="container table-responsive">
 
          <h3>User Menage</h3>
        
        <table class="css_table table_class table table-striped table-bordered table-responsive" id="table_id">
          <thead>
            <tr>
              <th class="col-xs-1 col-md-1 text-center"></th>
              <th class="col-xs-2 col-md-2 text-center"><span class="glyphicon glyphicon-user"></span> Name</th>
              <th class="col-xs-4 col-md-4 text-center"><img src="dist/images/glyphicons-45-keys.png"></img> Key</th>
              <th class="col-xs-2 col-md-2 text-center"><span class="glyphicon glyphicon-link"></span> URL</th>
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
          "ajax":"dist/sqlFunction/keyView_list.php"
        };
        $('#table_id').dataTable(opt);
      });
      
    </script>
  </body>
</html>

