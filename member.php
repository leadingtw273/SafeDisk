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
      .css_pan{
        border-radius:10px;
        padding-top: 50px;
      }
    </style>

  </head>

  <body>

    <!--Navbar-->
    <?php include("navbar.php");?>

    <!--Panel-->
    <div class="container col-md-8 col-md-offset-2 css_pan">
      <div class="panel panel-default">
        <div class="panel-heading">
          <p class="panel-title text-center"><a style="font-size: 36px;">User information</a></p>
        </div>
        <table class="table table-bordered table-hover table-striped w">
           <tr>
              <td class="col-sm-4"><h4>User Name：</h4></td>
              <td class="col-sm-8"><h4 id="name">NULL</h4></td>
           </tr> 
           <tr>
              <td><h4>User Email：</h4></td>
              <td><h4 id="email">NULL</h4></td>
           </tr> 
           <tr>
            <td><h4>User Phone：</h4></td>
            <td><h4 id="phone">NULL</h4></td>
           </tr>
          </table>
        <div>

        </div>
      </div>
    </div>

    <!--footer-->
    <?php include("footer.php");?>

    <!--JavaScript=====================================================================-->
    <script type="text/javascript">
      $(document).ready(function() {
        $("#name").load("dist/sqlFunction/contrl.php",{name:1});
        $("#email").load("dist/sqlFunction/contrl.php",{email:1});
        $("#phone").load("dist/sqlFunction/contrl.php",{phone:1});
      });
    </script>
  </body>
</html>

