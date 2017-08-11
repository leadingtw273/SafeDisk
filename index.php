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
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/auto.css" rel="stylesheet">

  </head>

  <body>

    <!--Navbar-->
    <?php include("navbar.php");?>
<div class="container-fluid">
    <div id="focusimg" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#focusimg" data-slide-to="0" class="active"></li>
        <li data-target="#focusimg" data-slide-to="1"></li>
        <li data-target="#focusimg" data-slide-to="2"></li>
      </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src= "dist/images/maker.jpg" alt="SafeDisk images">
        <div class="carousel-caption">
          <b><h1>SafeDisk</h1></b>
            <p>Note:If you have not yet purchased a safe flash drive please buy and then use</p>
            <p><a class="btn btn-lg btn-primary" href="https://hackmd.io/c/Bkm88zSmb/https%3A%2F%2Fhackmd.io%2FGwJhwQwBgIwdgLQ2ARhAgLAVigTgRABwCmECAJlseSsPLrgMwDGQA%3D%3D%3D" role="button">Buy now</a></p>
        </div>
      </div>
      <div class="item">
        <img src="dist/images/1.jpg" alt="SafeDisk images">
      </div>
      <div class="item">
        <img src="dist/images/bg2.jpg" alt="SafeDisk images">
      </div>
    </div>
    <a class="left carousel-control" href="#focusimg" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    </a>
    <a class="right carousel-control" href="#focusimg" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="trun"></span>
    </a>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row-md-12">
      <div class="col-md-offset-1 col-md-4">
        <img src="dist/images/USB.png" class="img-thumbnail">
      </div>
      <div class="col-md-7" style="padding-top: 80px;">
        <div class ="media" style="padding:0px 20px 0px">
          <div class="media-left media-middle">
            <span class="glyphicon glyphicon-tint" style="font-size: 50px;"></span>
          </div>
          <div class="media-body">
            <h3 class="media-heading">公司機密資料、私密檔案、照片、想留存紀念卻害怕別人看到內容；從現在起再也不必擔心，使用安心碟讓你自己也放心。</h3>
          </div>
         </div>
        <div class = "media" style="padding:25px 20px 25px">
          <div class="media-left media-middle">
            <span class="glyphicon glyphicon-leaf" style="font-size: 50px;"></span>
          </div>
          <div class="media-body">
            <h3 class="media-heading">使用者只要記得攜帶隨身碟，便能夠幫自己的資料封存，除了通過自己的認證誰都無法開啟，就算遺失也不必擔心機密外洩。</h3>
          </div>
        </div>
        <div class= "media" style="padding:0px 20px 0px">
          <div class="media-left media-middle">
            <span class="glyphicon glyphicon-tree-deciduous" style="font-size: 50px;"></span>
          </div>
          <div class="media-body">
            <h3 class="media-heading">將USB接上裝置；透過手機應用程式一鍵解鎖USB隨身碟，就是這麼簡單。</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid" style="background-color:#ccddFF">
    <div class="row" style="padding:10px;margin:20px">
      <div class="col-md-offset-2 col-md-4">
        <h1>SafeDisk 介紹影片</h1>
        <hr />
        <h2>
          <ul>
            <li>簡單</li>
            <li>快速便利</li>
            <li>全方位的保護</li>
          </ul>
        </h2>
      </div>
      <div class="col-md-4">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/DWhw4A6p2ck" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col-md-offset-2"></div>
    </div>
  </div>
    <!--footer-->
    <?php include("footer.php");?>
  </body>
</html>

