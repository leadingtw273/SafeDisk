<!--navbar-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <!--navbar-header-->
    <div class="navbar-header">
      <botton type="botton" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </botton>
        <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-tower"></span>Safe Disk</a>
    </div> 
    <!--navbar-body-->
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a id="register" href="disk_register.php" style="display:none"><span class="glyphicon glyphicon-plus"></span> Register</a></li>
        <li><a id="manage" href="disk_manage.php" style="display:none"><span class="glyphicon glyphicon-th"></span> Manage</a></li>
        <li><a id="user" href="user_infor.php" style="display:none"><span id="user_span" class="glyphicon glyphicon-user"></span></a></li>
        <li><a id="member_page" href="root_member.php" style="display:none"><span class="glyphicon glyphicon-th-list"></span> Member list</a></li>
        <li><a id="keyView_page" href="root_keyView.php" style="display:none"><span class="glyphicon glyphicon-th-list"></span> KeyView list</a></li>
        <li><a id="signout" href="#" style="display:none"><span class="glyphicon glyphicon-log-out"></span> Sign out</a></li>
        <li><a id="signup" href="#signup" data-toggle="modal" data-target="#Modal_Sigup" style="display:none"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
        <li><a id="login" href="#login" data-toggle="modal" data-target="#Modal_Login" style="display:none"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
        <li><a id="about" href="#about" ><span class="glyphicon glyphicon-wrench"></span> About</a></li>
      </ul> 
    </div>     
  </div>
</nav> 

<!--Modal Login-->
<div id="Modal_Login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Login Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <form id="loginForm">
          <label for="username">Username:</label>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" id="username" placeholder="Enter your username">
          </div>
          <label for="pwd">Password:</label>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" id="pwd" placeholder="Enter your password">
          </div>
          <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
            </div>
          <button type="submit" class="btn btn-default">Login</button>
        </form>
      </div>
    </div>

  </div>
</div>

<!--Modal Signup-->
<div id="Modal_Sigup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Signup Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Signup</h4>
      </div>
      <div class="modal-body">
        <form id="signupForm" >
          <lable for="email">Email:</lable>
          <div class="form-group">
            <input type="email" class="form-control" id="inputemail" placeholder="Enter your email" name="email">
          </div>
          <lable for="phonenumber">Phone number:</lable>
          <div class="form-group">  
            <input type="text" class="form-control" id="inputphone" placeholder="Enter your phonenumber" name="phone">
          </div>
          <lable for="username">User name:</lable>
          <div class="form-group">
            <input type="text" class="form-control" id="inputusername" placeholder="Enter your username" name="username">
          </div>
          <lable for="password">Password:</lable>
          <div class="form-group">
          <input type="password" class="form-control" id="inputpassword" placeholder="Enter your password" name="password">
          </div>
          <lable for="password">Password verify:</lable>
          <div class="form-group">
          <input type="password" class="form-control" id="inputverify" placeholder="Enter your password(again)" name="verifypassword">
          </div>
          <button type="submit" class="btn btn-primary center-block">sign up!</button>
        </form>
      </div>
    </div>

  </div>
</div>

<!--include JS-->
<script type="text/javascript" src="dist/js/jquery.min.js"></script>
<script type="text/javascript" src="dist/js/define.js"></script>
<script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.0/sweetalert2.min.js"></script> 
<script type="text/javascript" src="dist/js/bootstrapValidator.min.js"></script> 
<script type="text/javascript" src="dist/js/jquery.dataTables.min.js"></script> 

<!--set navbar option-->
<script type="text/javascript">
  
  $(document).ready(function() {
    var url = location.pathname;
    var url_1 = "/index.php";
    var url_2 = "/signup.php";
    //檢查是否已經登入
    $.ajax({
      type: "POST",
      url: location.origin+"/dist/sqlFunction/contrl.php",
      dataType:'text',
      async:false,
      data: {check : 1},
      success: function(res){
        if(res == '1'){
          $("#signup").css("display","block");
          $("#login").css("display","block");
          if(url != url_1 && url != url_2){
            swal({ 
              title: "You are not logged in yet", 
              type: "warning",
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "OK", 
              cancelButtonText: "cancel",
              showCancelButton: false, 
            }).then(function(){ 
              window.location = "index.php";
            });
          }
        }else if(res == 'root'){
          $("#signout").css("display","block");
          $("#user").css("display","block");
          $("#member_page").css("display","block");
          $("#keyView_page").css("display","block");
          $("#user_span").after(" "+res);

        }else{
          $("#register").css("display","block");
          $("#manage").css("display","block");
          $("#signout").css("display","block");
          $("#user").css("display","block");
          $("#user_span").after(" "+res);
        }
      },
      error: function(){
        swal("We found an error in your data.  Please return to home page and try again.", res,"error")
      }
    })

    //signout_set
    $('#signout').click(function(event) {
      swal({ 
        title: "Are you sure you want to log out?", 
        text: "You will lose all your current actions back to the home page", 
        type: "warning",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "signout", 
        cancelButtonText: "cancel",
        showCancelButton: true, 
      }).then(function(){ 
        $.ajax({
          type : 'POST',
          url  : location.origin+"/dist/sqlFunction/contrl.php",
          dataType : 'text',
          async:false,
          data : {signout : 1},
          success: function(res) {
            if(res == '1'){
              window.location = "index.php";
            }
          },
          error: function(){
            swal("We found an error in your data.  Please return to home page and try again.", res,"error")
          }
        });
      });
    });
    //sigup_set
    $('#signupForm').bootstrapValidator({
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
              message: 'The email is required'
            },
            emailAddress: {
              message: 'The input is not a valid email address'
            }
          }
        },
        phone: {
          validators: {
            notEmpty: {
              message: 'The phone is required'
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
            remote: {
                url: 'dist/sqlFunction/contrl.php',
                type: 'POST',
                message: 'The username is not available'
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
            },
            different: {
              field: 'username',
              message: 'The password and password cannot be the same as each other'
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
        url: location.origin+"/dist/sqlFunction/contrl.php",
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
    //login_set
    $('#loginForm').bootstrapValidator({
      message: 'This value is not valid',
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        username: {
          validators: {
            notEmpty: {
              message: 'The username is required'
            }
          }
        },
        password: {
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

      var user  = document.getElementById("username").value;
      var pwd   = document.getElementById("pwd").value;

      $.ajax({
        type: "POST",
        url: location.origin+"/dist/sqlFunction/contrl.php",
        dataType:'text',
        async:false,
        data: { 
                loginUser   : user,
                loginPwd    : pwd
              },
        success: function(res){
          switch(res){
            case '0':
              swal({
                title: "Login Error",
                type: "error",
                text: "username or password error",
                timer: 3000
              }).then(function(){
                  window.location = "index.php";
                },
                function(dismiss){
                  window.location = "index.php";
                }
              );
              break;
            case '1':
              swal({
                title: "Login Success",
                type: "success",
                text: "will close in 5 seconds.",
                timer: 5000
              }).then(function(){
                  window.location = "index.php";
                },
                function(dismiss){
                  window.location = "index.php";
                }
              );
              break;
            default:
          }
        },
        error: function(){
          swal("We found an error in your data.  Please return to home page and try again.", res,"error")
        }
      });
    });


  });
</script>