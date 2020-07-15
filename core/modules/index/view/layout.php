<!DOCTYPE html>
<html lang="es">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>TecnoTops</title>
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

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">
                <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
<!--
                    <a class="navbar-brand" href="tech-index.html"><img src="res/images/version/tech-logo.png" alt=""></a>-->
                    <a class="navbar-brand" href="./" style="padding-top: 10px; padding-bottom: 15px;">TECNO<b>TOPS</b></a>
                    
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="./">Inicio</a>
                            </li>
                            <li class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Por Categoría</a>
                                <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                                    <li>
                                        <div class="container">
                                            <div class="mega-menu-content clearfix">
                                                
                                                <div class="tab">
                                                    <?php 
                                                        $categories = PostsData::getNumPostByCategory();
                                                        foreach ($categories as $cat) { ?>
                                                            <button class="tablinks <?php if($cat->category == 'Otros') echo 'active' ?>" onclick="openCategory(event, '<?php echo $cat->category; ?>')"><?php echo $cat->category; ?></button>
                                                        <?php } ?>
                                                </div>

                                                <div class="tab-details clearfix">
                                
                                <?php foreach ($categories as $cat) { ?>   
                                            <div id="<?php echo $cat->category ?>" class="tabcontent <?php if($cat->category == 'Otros') echo 'active' ?>">
                                
                                                        <div class="row">
                                                            <?php 
                                                            $videosCategory = PostsData::getVideosByCategory($cat->category); 
                                                            foreach ($videosCategory as $vc) { ?>
                                        
                                                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                                <div class="blog-box">
                                                                    <div class="post-media">
                                                                        <a href="?view=top&post=<?php echo $vc->postID ?>" title="">
                                                                            <img src="res/upload/788x443/<?php echo $vc->imageName ?>" alt="" class="img-fluid">
                                                                            <div class="hovereffect">
                                                                            </div><!-- end hover -->
                                                                            <span class="menucat"><?php echo $vc->title; ?></span>
                                                                        </a>
                                                                    </div><!-- end media -->
                                                                </div><!-- end blog-box -->
                                                            </div>

                                        <?php } ?>

                                                        </div><!-- end row -->
                                                    </div>
                                    <?php } ?>

                                                </div><!-- end tab-details -->
                                            </div><!-- end mega-menu-content -->
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?view=search">Buscar</a>
                            </li>

                        </ul>
                        <div class="nav-item">
                                <a href="?module=user" class="nav-link">
                                    <i class="fa fa-user"></i>
                                </a>
                        </div>
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->


<!-- - - - - - - - - - - - - - - -->
<?php 
	View::load("index");
?>

<!-- - - - - - - - - - - - - - - -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="widget">
                            <div class="footer-text text-left">
                                <a href="./" style="font-size: 30px">TECNO<b>TOPS</b></a>
                                <p>Un sitio para compartir los mejores tops y esas ondas</p>
                                <!-- SOCIAL -->
                                <div class="social">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                </div>
                                
                                <hr class="invis">

                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Categorías</h2>
                            <div class="link-widget">
                                <ul>
                                    <?php 
                                    
                                        for ($i=0; $i < 4; $i++) { 
                                            echo '<li><a href="?view=search&category='.$categories[$i]->category.'">'.$categories[$i]->category .'<span>'.$categories[$i]->numPostByCategory .'</span></a></li>';
                                        }

                                     ?>
                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div>

                
                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <div class="copyright">&copy; TecnoTops - 2020</div>
                    </div>
                </div>
        </footer><!-- end footer -->

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="res/js/jquery.min.js"></script>
    <script src="res/js/tether.min.js"></script>
    <script src="res/js/bootstrap.min.js"></script>
    <script src="res/js/custom.js"></script>

</body>
</html>