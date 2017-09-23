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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.0/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrapValidator.min.css" >
    <link rel="stylesheet" type="text/css" href="dist/css/auto.css">
    
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
      .css_button{
        width: 100px;
      }
    </style>

  </head>

  <body>

    <!--Navbar-->
    <?php include("page_navbar.php");?>
    
    <!--Panel-->
    <div class="container col-md-8 col-md-offset-2 css_pan">
      <div class="panel panel-default">
        <div class="panel-heading">
          <p class="panel-title text-center"><a style="font-size: 36px;">Register</a></p>
        </div>
        <form class="form-horizontal css_form" id="addKeyForm" method="post">
          <div class="form-group" style="font-size: 22px;">
            <lable for="email" class="control-label col-sm-4">Key:</lable>
            <div class="col-sm-5">
              <input type="text" class="form-control input-lg" id="inputkey" placeholder="Enter your key" name="key">
            </div>
          </div>
          <button type="submit" class="btn btn-primary center-block css_button btn-lg">OK</button>
        </form>
      </div>
    </div>

    <!--footer-->
    <?php include("page_footer.php");?>

    <!--JavaScript=====================================================================-->
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
            url: location.origin+"/dist/sqlFunction/contrl.php",
            dataType:'text',
            async:false,
            data: {addKey : key},
            success: function(msg){
              if(msg == '0'){
                swal({
                  title: "Error",
                  text:  "Has been used or does not have this key",
                  type:  "error",
                  showCancelButton: false, 
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "OK!", 
                  closeOnConfirm: false
                });
              }else{

                var sent_url = msg;
                var sent_key = $("#inputkey").val();

                swal({
                  title:'傳送中...',
                  allowEscapeKey: false,
                  allowOutsideClick: false,
                  onOpen: function(){
                    $.ajax({
                      type: "POST",
                      url: location.origin+"/emailSenter.php",
                      dataType:'text',
                      async:false,
                      data: {sent_url : sent_url,sent_key : sent_key},
                      success: function(msg){
                        if(msg == '1'){
                          swal({
                            title: "Success",
                            text: "You can already use it",
                            type: "success",
                            showCancelButton: false, 
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "OK!", 
                          }).then(function(){
                            window.location = 'disk_manage.php';
                          });
                        }else{
                          swal(
                            "Sent Error",
                            "sent faill!",
                            "error"
                          );
                        }
                      },
                      error: function(){
                        swal("We found an error in your data.  Please return to home page and try again.", res,"error")
                      }
                    })
                  }
                });
                swal.showLoading();

                
              }
            },
            error: function(){
              swal("We found an error in your data.  Please return to home page and try again.", res,"error")
            }
          });


        });
      });
    </script>

  </body>

</html>

