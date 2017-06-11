<?php  session_start();
    if(!isset($_POST['pwd'])){session_destroy();}?>
<!DOCTYPE html>
<html lang="en"  style="
    background-image: url(https://www.w3schools.com/w3images/forestbridge.jpg);
    min-height: 100%;
    background-position: center;
    background-size: cover;">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color: rgba(0, 0, 0, 0)!important;">

<div class="container" style="width: 500px;transform: translate(-50%,-50%);
    position: absolute;
    top: 50%;
    width: 500px;
    left: 50%;">
  <h2 style="text-align: center;color: white;text-shadow: black -1px 1px 4px;">Login</h2>
    <hr>
  <form method="post" class="form-horizontal">
    <!--<div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email">
      </div>
    </div>-->
    <div class="form-group">
      <!--<label class="control-label col-sm-2" for="pwd">Password:</label>-->
      <div class="col-sm-12">          
        <input name="pwd" type="password" class="form-control" id="pwd" placeholder="Enter password">
      </div>
    </div>
    <!--<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox"> Remember me</label>
        </div>
      </div>
    </div>-->
    <div class="form-group" style="text-align: center;">        
      <div class="col-sm-12">
        <button style="width: 100%;" type="submit" class="btn btn-info">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
<?php
if(isset($_POST['pwd'])){
    unset($_SESSION["pass"]);
    $_SESSION['pass'] = $_POST['pwd'];
    header ('location: /users.php');
}
    
    
    
    
    
    
    
