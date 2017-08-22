    <style>
      .中文字體,h4{
        font-family: "微軟正黑體";
      }
      .英文字體{
        font-family: "Edwardian Script ITC";
      }
    </style>
  <!--   .bgnoshow:hover{
        background-color: rgba(0,0,0,0);
        font-size: 20px;
        font-family: "微軟正黑體";
        padding:0px 0px 0px;
        min-height: 0px;
        margin-bottom: 0px;
        border-width: 0px;
      }-->

<!--navbar-->
<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" id="topnavbar">
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
        <li><a id="register" data-toggle="modal" data-target="#registerUSB"><span class="glyphicon glyphicon-plus"></span> 新增裝置</a></li>
        <li><a id="manage" href="disk_manage.php"><span class="glyphicon glyphicon-th"></span> 裝置管理</a></li>
        <li><a id="user" href="member.php" ><span id="user_span" class="glyphicon glyphicon-user"></span></a></li>
        <li><a id="member_page" href="member_page.php"><span class="glyphicon glyphicon-th-list"></span> 使用者清單</a></li>
        <li><a id="keyView_page" href="keyView_page.php"><span class="glyphicon glyphicon-th-list"></span> 金鑰管理</a></li>
        <li><a id="signout" href="#"><span class="glyphicon glyphicon-log-out"></span> 登出</a></li>
        <li><a id="signup" data-toggle="modal" data-target="#modalsignup"><span class="glyphicon glyphicon-user"></span> 註冊</a></li>
        <li><a id="login" href="#login" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> 登入</a></li>
        <li><a id="about" href="#about" ><span class="glyphicon glyphicon-wrench"></span> About</a></li>
      </ul> 
    </div>     
  </div>
</nav> 

<!--Modal-->
<div id="myModal" class="modal fade" role="dialog" style="padding-top:10%">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title">會員登入</h4>
      </div>
      <div class="modal-body">
        <form id="loginForm" class="form-horizontal">
          <label for="username" class="col-sm-3 control-label">帳號：</label>
            <div class="form-group input-group col-sm-6">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" class="form-control" id="username" placeholder="輸入登入帳號">
            </div>
            <div class="col-sm-offset-3"></div>
          <label for="pwd" class="col-sm-3 control-label">密碼：</label>
            <div class="form-group input-group col-sm-6">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" class="form-control" id="pwd" placeholder="輸入登入密碼">
            </div>
            <div class="col-sm-offset-3">
          </div>
          <div class="col-sm-offset-2 col-sm-3">
            <div class="checkbox">
              <label><input type="checkbox"> 記住帳密</label>
            </div>
          </div>
          <label class="col-sm-4 control-label"><a href="registered.php">註冊</a>或<a href="#">忘記密碼</a>??</label>
          <div class="form-group">
            <div class=" col-sm-offset-4 col-sm-8" style="padding-top: 20px">
              <button type="submit" class="move_button" style="width: 100px ;height:40px;font-size: 20px;background-color:#0066FF"><span>登入 </span></button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<?php include('move_button.php');?>

<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="dist/plug/sweetalert2/dist/sweetalert2.min.js"></script> 
<script src="dist/js/bootstrapValidator.min.js"></script> 
<script src="dist/js/jquery.dataTables.min.js"></script> 
<!--set navbar option-->
<script type="text/javascript">
  
  $(document).ready(function() {
    $("#register").hide();
    $("#manage").hide();
    $("#user").hide();
    $("#member_page").hide();
    $("#keyView_page").hide();
    $("#signout").hide();
    $("#signup").hide();
    $("#login").hide();
    $("#about").hide();

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
          $("#user").hide();
          $("#member_page").hide();
          $("#keyView_page").hide();
          $("#signout").hide();
          $("#signup").fadeIn();
          $("#login").fadeIn();
          $("#about").fadeIn();
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
          $("#register").hide();
          $("#manage").hide();
          $("#user").fadeIn();
          $("#member_page").fadeIn();
          $("#keyView_page").fadeIn();
          $("#signout").fadeIn();
          $("#signup").hide();
          $("#login").hide();
          $("#about").fadeIn();
          $("#user_span").after(" "+res);
        }else{
          $("#register").fadeIn();
          $("#manage").fadeIn();
          $("#user").fadeIn();
          $("#member_page").hide();
          $("#keyView_page").hide();
          $("#signout").fadeIn();
          $("#signup").hide();
          $("#login").hide();
          $("#about").fadeIn();
          $("#user_span").after(" "+res);
        }
      },
      error: function(){
        swal("We found an error in your data.  Please return to home page and try again.", res,"error")
      }
    });
});
    //signout_set
    $('#signout').click(function(event) {
      swal({ 
        title: "即將登出", 
        text: "記得時常回來關心最新消息呦", 
        type: "info",
        confirmButtonColor: "#33cccc",
        confirmButtonText: "確定", 
        cancelButtonText: "取消",
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
  $(function() { 
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
              message: '請正確的輸入帳號'
            }
          }
        },
        password: {
          validators: {
            notEmpty: {
              message: '請正確輸入密碼'
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
                title: "登入失敗",
                type: "error",
                text: "輸入的帳號或密碼有錯",
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
  <?php include('disk_register.php');?>
  <?php include('signup.php');?>