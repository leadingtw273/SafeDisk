
  <div class="modal fade" id="modalsignup" tabindex="-1" role="dialog" aria-labelledby="Modalsignup" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="中文字體 modal-title" id="Modalsignup">註冊會員</h4>
        </div>
        <div class="modal-body">
          <form class="css_form form-horizontal" id="sigupForm" method="post">
            <div class="form-group">
              <lable for="email" class="control-label col-sm-3">Email：</lable>
              <div class="col-sm-8">
                <input type="email" class="form-control" id="inputemail" placeholder="Enter your email" name="email">
              </div>
              <div class="col-sm-offset-1"></div>
            </div>
            <div class="form-group">
              <lable for="phonenumber" class="control-label col-sm-3">手機號碼：</lable>
              <div class="col-sm-8">  
                <input type="text" class="form-control" id="inputphone" placeholder="Enter your phonenumber" name="phone">
              </div>
              <div class="col-sm-offset-1"></div>
            </div>
            <div class="form-group">
              <lable for="username" class="control-label col-sm-3">帳號：</lable>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputusername" placeholder="Enter your username" name="username">
              </div>
              <div class="col-sm-offset-1"></div>
            </div>
            <div class="form-group">
              <lable for="password" class="control-label col-sm-3">密碼：</lable>
              <div class="col-sm-8">
              <input type="password" class="form-control" id="inputpassword" placeholder="Enter your password" name="password">
              </div>
              <div class="col-sm-offset-1"></div>
            </div>
            <div class="form-group">
              <lable for="password" class="control-label col-sm-3">確認密碼：</lable>
              <div class="col-sm-8">
              <input type="password" class="form-control" id="inputverify" placeholder="Enter your password(again)" name="verifypassword">
              </div>
              <div class="col-sm-offset-1"></div>
            </div>
            <div class="form-group" id='notrobot'>
              <div class="col-sm-offset-3 col-sm-9">
                <label>
                  <div class="g-recaptcha" id="norobot" data-sitekey="6Le9tisUAAAAAJPbIUjZpco-1JdFxq0vY6QEdBg4"></div>
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary center-block">註冊</button>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
    <!--JavaScript=====================================================================-->
  <script src='dist/js/api.js' async defer></script>
   <script type="text/javascript">
      $ (document).ready(function() {
        $("#span_notrobot").hide();
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
                    message: '帳號重複，不可使用'
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
                        title: "註冊成功!!",
                        text: "可以開始使用你的新帳號囉",
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
                  swal("我們發現一個錯誤導致你的註冊失敗，請在網路良好環境下重新註冊一次", msg,"error")
                }
              });//close ajax
        });
      });

function VerifyReCaptcha(GResponse){ //我不是機器人認證函數
  $.ajax(
  {
    url:"VerifyReCaptcha.php",
    type : "POST",
    dataType :'html',
    async: true,
    date:{
      reCaptchaResponse: GResponse
    },
    success:function(msg){
      switch(msg){
        case "OK":
          $('.g-recaptcha').fadeOut();
            $("#span_notrobot").fadeOut();
            $("#notrobot").fadeOut();
          break;
        case 'ERROR':
          swal('驗證失敗!請在試一次!');
          break;
      }
    },
    error:function(xhr){
      swal('發生不明錯誤!請在試一次!');
    },
  }
    );
}

$(document).ready (function(){
  var IntervalID = setInterval(function(){
    if($("#g-recaptcha-response").val()!='')
    {
      VerifyReCaptcha($("#g-recaptcha-response").val());
      clearInterval(IntervalID);
    }
  },1000);
});
    </script>
