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
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrapValidator.min.css" >
    
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
          <h3 class="panel-title">Register</h3>
        </div>
        <form class="form-horizontal" id="addKeyForm" method="post">
          <div class="form-group">
            <lable for="email" class="control-label col-sm-4">Key:</lable>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="inputkey" placeholder="Enter your key" name="key">
            </div>
          </div>
          <button type="submit" class="btn btn-primary center-block">sign up!</button>
        </form>
      </div>
    </div>

    <script type="text/javascript">
      $ (document).ready(function() {
        $('#addKeyForm').bootstrapValidator({
          message: 'This value is not valid',
          feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
            key: {
              validators: {
                notEmpty: {
                  message: 'The password is required'
                }
              }
            }
          }
        }).on('success.form.bv',function(e){
          // Prevent form submission
          e.preventDefault();

          // Get the form instance
          var $form = $(e.target);

          // Get the BootstrapValidator instance
          var bv = $form.data('bootstrapValidator');

          //alert("made it to submit handler block!");
            var key = document.getElementById("inputkey").value;

            $.ajax({
              type: "POST",
              url: "http://127.0.0.1/SafeDisk/dist/sqlFunction/contrl.php",
              dataType:'text',
              async:false,
              data: { 
                      addKey  : key,
                    },
              success: function(msg){
                if(msg == '0'){
                  swal({
                      title: "Error",
                      text: "Has been used or does not have this key",
                      type: "error",
                      showCancelButton: false, 
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "OK!", 
                      closeOnConfirm: false
                    }
                  );
                }
              },
              error: function(){
                swal("We found an error in your data.  Please return to home page and try again.", msg,"error")
              }
            });//close ajax

        });
      });
    </script>
  </body>
</html>

