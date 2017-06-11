<?php
require_once('config.php');
 session_start();


 if (isset($_SESSION['pass'])) {
 
     if($_SESSION['pass'] == PASSWORD){
         
     }else {
   header ('location: /login.php');
 }

 } else {
   header ('location: /login.php');
 }
?>
<!DOCTYPE html>
<html>
<title>Control Panel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-container w3-top w3-black w3-large w3-padding" style="z-index:4">
  <button class="w3-button w3-hide-large w3-padding-0 w3-black w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-right">Control Panel</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="https://www.w3schools.com/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Admin</strong></span><br>
      <!--<a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>-->
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <!--<a href="/" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>-->
    <a href="/users.php" class="w3-bar-item w3-button w3-padding <?php if($_SERVER['PHP_SELF'] == '/users.php'){echo 'w3-blue';} ?>"><i class="fa fa-eye fa-fw"></i>  Users</a>
    <a href="/domains.php" class="w3-bar-item w3-button w3-padding <?php if($_SERVER['PHP_SELF'] == '/domains.php'){echo 'w3-blue';} ?>"><i class="fa fa-users fa-fw"></i>  Domains</a>
    <a href="/trust.php" class="w3-bar-item w3-button w3-padding <?php if($_SERVER['PHP_SELF'] == '/trust.php'){echo 'w3-blue';} ?>"><i class="fa fa-bullseye fa-fw"></i>  Trustworthiness</a>
    <a href="/anomalous.php" class="w3-bar-item w3-button w3-padding <?php if($_SERVER['PHP_SELF'] == '/anomalous.php'){echo 'w3-blue';} ?>"><i class="fa fa-diamond fa-fw"></i>  Anomalous</a>
    <a href="/login.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  Logout</a><!--
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a>--><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! --------------------------------------------------------------->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">