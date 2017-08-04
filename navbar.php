<!--navbar JS-->
<script>
  $('#identifier').modal(options)
</script>

<!--navbar-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <botton type="botton" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </botton>
        <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-tower"></span>Safe Disk</a>
    </div> 
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
        <li><a href="#login" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
        <li><a href="#about" ><span class="glyphicon glyphicon-wrench"></span> About</a></li>
      </ul> 
    </div>     
  </div>
</nav> 

<!--modal-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <form>
          <label for="username">Username:</label>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
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