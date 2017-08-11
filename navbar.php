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
        <li><a id="register" href="disk_register.php"><span class="glyphicon glyphicon-plus"></span> Register</a></li>
        <li><a id="manage" href="disk_manage.php"><span class="glyphicon glyphicon-th"></span> Manage</a></li>
        <li><a id="user" href="member.php" ><span id="user_span" class="glyphicon glyphicon-user"></span></a></li>
        <li><a id="member_page" href="member_page.php"><span class="glyphicon glyphicon-th-list"></span> Member list</a></li>
        <li><a id="keyView_page" href="keyView_page.php"><span class="glyphicon glyphicon-th-list"></span> KeyView list</a></li>
        <li><a id="signout" href="#"><span class="glyphicon glyphicon-log-out"></span> Sign out</a></li>
        <li><a id="signup" href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
        <li><a id="login" href="#login" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
        <li><a id="about" href="#about" ><span class="glyphicon glyphicon-wrench"></span> About</a></li>
      </ul> 
    </div>     
  </div>
</nav> 

<!--Modal-->
<div id="myModal" class="modal fade" role="dialog">
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

<!--include JS-->
<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="dist/plug/sweetalert2/dist/sweetalert2.min.js"></script> 
<script src="dist/js/bootstrapValidator.min.js"></script> 
<script src="dist/js/jquery.dataTables.min.js"></script> 

<!--set navbar option-->
<script type="text/javascript">
  
  $(document).ready(function() {
    var url = location.pathname;
    var url_1 = "/SafeDisk/index.php";
    var url_2 = "/SafeDisk/signup.php";
    //檢查是否已經登入
    $.ajax({
      type: "POST",
      url: "http://127.0.0.1/SafeDisk/dist/sqlFunction/contrl.php",
      dataType:'text',
      async:false,
      data: {check : 1},
      success: function(res){
        if(res == '1'){
          $("#register").hide();
          $("#manage").hide();
          $("#signout").hide();
          $("#user").hide();
          $("#member_page").hide();
          $("#keyView_page").hide();
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
          $("#signup").hide();
          $("#login").hide();
          $("#register").hide();
          $("#manage").hide();
          $("#user_span").after(" "+res);

        }else{
          $("#member_page").hide();
          $("#keyView_page").hide();
          $("#signup").hide();
          $("#login").hide();
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
          url  : "http://127.0.0.1/SafeDisk/dist/sqlFunction/contrl.php",
          type : 'POST',
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
        url: "http://127.0.0.1/SafeDisk/dist/sqlFunction/contrl.php",
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