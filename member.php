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
<?php include("fileofcss.php");?>
    <!--CSS-->
    <style>
      .css_pan{
        border-radius:10px;
        padding-top: 50px;
      }
      .css_word{
        text-align: center;
      }
      .css_edit{
         font-size: 20px;
         padding-top: 8px;
      }
    </style>
  </head>
  <body>
      <!--Navbar-->
    <?php include("navbar.php");?>
      <!--Panel-->
    <div class="container-fluid css_pan">
      <div class=" col-md-8 col-md-offset-2 ">
        <div class="panel panel-info">
          <div class="panel-heading">
            <p class="panel-title text-center"><a style="font-size: 60px;font-family: Brush Script MT">Account information</a></p>
          </div>
          <table class="table table-bordered table-hover table-striped">
             <tr>
                <td class="col-sm-4 css_word" ><h4>Name：</h4></td>
                <td class="col-sm-8"><h4 id="name">NULL</h4></td>
                <td><button class="glyphicon glyphicon-edit css_edit"></button></td>
             </tr> 
             <tr>
                <td class="css_word"><h4>Email：</h4></td>
                <td><h4 id="email">NULL</h4></td>
                <td><button class="glyphicon glyphicon-edit css_edit"></button></td>
             </tr> 
             <tr>
              <td class="css_word"><h4>Phone：</h4></td>
              <td><h4 id="phone">NULL</h4></td>
              <td><button class="glyphicon glyphicon-edit css_edit"></button></td>
             </tr>
          </table>
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

