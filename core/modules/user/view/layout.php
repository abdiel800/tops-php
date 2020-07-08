<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login - TecnoTops</title>
    <link rel="stylesheet" type="text/css" href="res/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="res/font-awesome/css/font-awesome.min.css">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="res/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="res/images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="res/css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="res/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="res/style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="res/css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="res/css/colors.css" rel="stylesheet">

    <!-- Version Tech CSS for this template -->
    <link href="res/css/version/tech.css" rel="stylesheet">

</head>

<body>
<header class="navbar navbar-inverse navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
          <a href="./"><i class="fa fa-home"></i> Inicio </a>
          <?php if(isset($_SESSION["user_id"])):?>
          <a href="./?module=user&view=home"><i class="fa fa-dashboard"></i> Dashboard</a>
          <?php endif; ?>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      
    </nav>
  </div>
</header>
<!-- - - - - - - - - - - - - - - -->
<?php 
	View::load("index");
?>
<!-- - - - - - - - - - - - - - - -->
<div class="container">
  <div class="row">
  <div class="col-md-12">
  <hr>
  <p>tops &copy; 2020</p>
  </div>
  </div>
</div>
<!--
<script src="res/jquery.min.js"></script>
<script src="res/bootstrap/js/bootstrap.min.js"></script>-->

    <script src="res/js/jquery.min.js"></script>
    <script src="res/js/tether.min.js"></script>
    <script src="res/js/bootstrap.min.js"></script>
    <script src="res/js/custom.js"></script>
</body>
</html>