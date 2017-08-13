<!--use modalfade include to navbar.php-->
<div class="modal fade" id="registerUSB" tabindex="-1" role="dialog" aria-labelledby="registerUSBLabel" aria-hidden="true" style="padding-top:10% ">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="中文字體 modal-title" id="registerUSBLabel">綁定新裝置</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal css_form" id="addKeyForm" method="post">
          <div class="form-group" style="font-size: 22px;">
            <lable for="email" class="control-label col-sm-4">Key:</lable>
            <div class="col-sm-5">
              <input type="text" class="form-control input-lg" id="inputkey" placeholder="請輸入裝置金鑰" name="key">
            </div>
          </div>
          <button type="submit" class="btn btn-primary center-block css_button btn-lg">OK</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--include JS-->
<script type="text/javascript">
  //BootstrapValidator
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
              message: '請輸入產品金鑰'
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
        data: {addKey : key},
        success: function(msg){
          if(msg == '0'){
            swal({
              title: "此編號無法使用",
              text:  "請確認是否正確輸入或重複申請",
              type:  "error",
              showCancelButton: false, 
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "確定", 
              closeOnConfirm: false
            });
          }else{
            swal({
              title: "Success",
              text: "綁定成功!!",
              type: "success",
              showCancelButton: false, 
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "確定", 
              closeOnConfirm: false
            }).then(function(){
              window.location = 'disk_manage.php';
            });
          }
        },
        error: function(){
          swal("We found an error in your data.  Please return to home page and try again.", res,"error")
        }
      });
    });
  });
</script>
