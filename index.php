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
    <link rel="stylesheet" type="text/css" href="dist/css/auto.css">

    <style>
    .bg {
      background: url('./dist/images/bk.jpg') no-repeat center center;
      position: fixed;
      width: 100%;
      height: 350px; /*same height as jumbotron */
      top:0;
      left:0;
      z-index: -1;
    }

    .jumbotron {
      margin-bottom: 0px;
      height: 350px;
      color: white;
      text-shadow: black 0.3em 0.3em 0.3em;
      background:transparent;
    }
    </style>

  </head>

  <body>
    
    <!--Navbar-->
    <?php include("page_navbar.php");?>

    <!--MainPage Jumbotron-->
    <div class="bg"></div>
    <div class="container">
      <div class="jumbotron">
        <h1>SafeDisk</h1>
        <p >Safe your disk</p>
      </div>
    </div>
    

    <!--row and columns text-->
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h2><span class="glyphicon glyphicon-tint" style="font-size: 40px;"></span>實用</h2>
          <p>公司機密資料、私密檔案、照片、想留存紀念卻害怕別人看到內容；從現在起再也不必擔心，使用安心碟讓你自己也放心。</p>
        </div>
        <div class="col-md-4">
          <h2><span class="glyphicon glyphicon-leaf" style="font-size: 40px;"></span>安全</h2>
          <p>使用者只要記得攜帶隨身碟，便能夠幫自己的資料封存，除了通過自己的認證誰都無法開啟，就算遺失也不必擔心機密外洩。</p>
        </div>
        <div class="col-md-4">
          <h2><span class="glyphicon glyphicon-tree-deciduous" style="font-size: 40px;"></span>簡單</h2>
          <p>將USB接上裝置；透過手機應用程式一鍵解鎖USB隨身碟，就是這麼簡單。</p>
        </div>
      </div>
    </div>

    <!--footer-->
    <?php include("page_footer.php");?>

    <!--javascript-->
    <script type="text/javascript">
      var jumboHeight = $('.jumbotron').outerHeight();
      function parallax(){
          var scrolled = $(window).scrollTop();
          $('.bg').css('height', (jumboHeight-scrolled) + 'px');
      }

      $(window).scroll(function(e){
          parallax();
      });
    </script>

  </body>
</html>