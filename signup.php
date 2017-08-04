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
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/SD_index.css" rel="stylesheet">

    <script src="dist/js/JStest.js"></script>

    <style>
      .form-horizontal{
        padding-top: 30px; 
        padding-right: 30px;
        padding-left: 30px;
        padding-bottom: 30px;
      } 
      .panel{
        border-radius:10px
        padding-top: 50px;
      }

    </style>
  
  </head>

  <body>

    <!--NAVBAR-->

    <?php include("navbar.php");?>

    <!--FORMS-->

    <div class="container col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Sign UP!</h3>
        </div>
        <form class="form-horizontal">
          <div class="form-group">
            <lable for="email" class="control-label col-sm-4">Email:</lable>
            <div class="col-sm-5">
              <input type="email" class="form-control" id="inputemail" placeholder="email">
            </div>
          </div>
          <div class="form-group">
            <lable for="phonenumber" class="control-label col-sm-4">Phone number:</lable>
            <div class="col-sm-5">  
              <input type="text" class="form-control" id="inputphone" placeholder="phonenumber">
            </div>
          </div>
          <div class="form-group">
            <lable for="username" class="control-label col-sm-4">User name:</lable>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="inputusername" placeholder="username">
            </div>
          </div>
          <div class="form-group">
            <lable for="password" class="control-label col-sm-4">Password:</lable>
            <div class="col-sm-5">
            <input type="password" class="form-control" id="inputpassword" placeholder="password">
            </div>
          </div>
          <div class="form-group">
            <lable for="password" class="control-label col-sm-4">Password verify:</lable>
            <div class="col-sm-5">
            <input type="password" class="form-control" id="inputverify" placeholder="password(again)">
            </div>
          </div>
          <button type="submit" class="btn btn-primary center-block">sign up!</button>
        </form>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="dist/js/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/plug/sweetalert/dist/sweetalert.min.js"></script> 
    <script type="text/javascript" charset="utf-8">
          SIDOJGUERQHGUJEW

    </script>

  </body>
</html>

