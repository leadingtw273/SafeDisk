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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
          <h3 class="panel-title">註冊</h3>
        </div>
        <form class="css_form form-horizontal" id="sigupForm" method="post">
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
                  message: '請輸入Email'
                },
                emailAddress: {
                  message: '請正確輸入 Email 格式'
                }
              }
            },
            phone: {
              validators: {
                notEmpty: {
                  message: '請輸入正確行動電話號碼'
                },
                digits: {
                  message: '請輸入正確行動電話號碼'
                }
              }
            },
            username: {
              validators: {
                notEmpty: {
                  message: '請輸入使用者帳號'
                },
                stringLength: {
                  min: 6,
                  max: 30,
                  message: '帳號需介於 6 至 30 之間；建議使用英文、數字混和增加帳號強度'
                },
                regexp: {
                  regexp: /^[a-zA-Z0-9_\.]+$/,
                  message: '不可使用英文、數字以外的字元'
                },
                remote: {
                    url: 'dist/sqlFunction/contrl.php',
                    type: 'POST',
                    message: '此帳號不可用'
                },
                different: {
                  field: 'password',
                  message: '帳號和密碼不能相同'
                }
              }
            },
            password: {
              validators: {
                notEmpty: {
                  message: '請輸入密碼'
                },
                different: {
                  field: 'username',
                  message: '帳號和密碼不可相同'
                }
              }
            },
            verifypassword: {
              validators: {
                notEmpty: {
                  message: '請重複輸入密碼'
                },
                identical: {
                  field: 'password',
                  message: '與密碼不同，請確認輸入密碼是否正確'
                },
                different: {
                  field: 'username',
                  message: '帳號和密碼不可相同'
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
                    }).then(function(){
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

