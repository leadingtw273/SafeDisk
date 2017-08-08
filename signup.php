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
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrapValidator.min.css" >
    <link href="dist/css/auto.css" rel="stylesheet">

    <!--CSS-->
    <style>
      .css_pan{
        border-radius:10px;
        padding-top: 50px;
      }
      .css_form{
        padding-top: 30px;
        padding-bottom: 30px;
      }
    </style>
  
  </head>

  <body>

    <!--NAVBAR-->
    <?php include("navbar.php");?>

    <!--FORMS-->
    <div class="container col-md-8 col-md-offset-2 css_pan">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Sign UP!</h3>
        </div>
        <form class="css_f form-horizontal" id="sigupForm" method="post">
          <div class="form-group">
            <lable for="email" class="control-label col-sm-4">Email:</lable>
            <div class="col-sm-5">
              <input type="email" class="form-control" id="inputemail" placeholder="Enter your email" name="email">
            </div>
          </div>
          <div class="form-group">
            <lable for="phonenumber" class="control-label col-sm-4">Phone number:</lable>
            <div class="col-sm-5">  
              <input type="text" class="form-control" id="inputphone" placeholder="Enter your phonenumber" name="phone">
            </div>
          </div>
          <div class="form-group">
            <lable for="username" class="control-label col-sm-4">User name:</lable>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="inputusername" placeholder="Enter your username" name="username">
            </div>
          </div>
          <div class="form-group">
            <lable for="password" class="control-label col-sm-4">Password:</lable>
            <div class="col-sm-5">
            <input type="password" class="form-control" id="inputpassword" placeholder="Enter your password" name="password">
            </div>
          </div>
          <div class="form-group">
            <lable for="password" class="control-label col-sm-4">Password verify:</lable>
            <div class="col-sm-5">
            <input type="password" class="form-control" id="inputverify" placeholder="Enter your password(again)" name="verifypassword">
            </div>
          </div>
          <button type="submit" class="btn btn-primary center-block">sign up!</button>
        </form>
      </div>
    </div>

    <!--footer-->
    <?php include("footer.php");?>

    
    <!--JavaScript=====================================================================-->
    <script type="text/javascript">
      $ (document).ready(function() {
        $('#sigupForm').bootstrapValidator({
          message: 'This value is not valid',
          feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
            email: {
              validators: {
                notEmpty: {
                  message: 'The password is required'
                },
                emailAddress: {
                  message: 'The input is not a valid email address'
                }
              }
            },
            phone: {
              validators: {
                notEmpty: {
                  message: 'The password is required'
                },
                digits: {
                  message: 'The value can contain only digits'
                }
              }
            },
            username: {
              validators: {
                notEmpty: {
                  message: 'The username is required'
                },
                stringLength: {
                  min: 6,
                  max: 30,
                  message: 'The username must be more than 6 and less than 30 characters long'
                },
                regexp: {
                  regexp: /^[a-zA-Z0-9_\.]+$/,
                  message: 'The username can only consist of alphabetical, number, dot and underscore'
                },
                different: {
                  field: 'password',
                  message: 'The username and password cannot be the same as each other'
                }
              }
            },
            password: {
              validators: {
                notEmpty: {
                  message: 'The password is required'
                },
                identical: {
                  field: 'verifypassword',
                  message: 'The password and its confirm must be the same'
                },
                different: {
                  field: 'username',
                  message: 'The password and password cannot be the same as each other'
                }
              }
            },
            verifypassword: {
              validators: {
                notEmpty: {
                  message: 'The password is required'
                },
                identical: {
                  field: 'password',
                  message: 'The password and its confirm must be the same'
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
            var email = document.getElementById("inputemail").value;
            var phone = document.getElementById("inputphone").value;
            var user  = document.getElementById("inputusername").value;
            var pwd   = document.getElementById("inputpassword").value;

            $.ajax({
              type: "POST",
              url: "http://127.0.0.1/SafeDisk/dist/sqlFunction/contrl.php",
              dataType:'text',
              async:false,
              data: { 
                      addEmail  : email,
                      addPhone  : phone,
                      addUser   : user,
                      addPwd    : pwd
                    },
              success: function(msg){
                if(msg == '1'){
                  swal({
                      title: "Successfully joined members",
                      text: "Go back to your homepage and sign in with your new account!",
                      type: "success",
                      showCancelButton: false, 
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "OK!", 
                      closeOnConfirm: false
                    },
                    function(){
                      window.location = 'index.php';
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

