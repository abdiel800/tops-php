<?php 
$posts = PostsData::getPostCount();

$lastPost = PostsData::getLast();

$penultimatePost = PostsData::getPenultimate();

//Paginacion
$postByPage = 2;

if (isset($_GET['p']) && !is_numeric($_GET['p'])) {
    Core::redir('?view=error404');
}elseif (isset($_GET['p']) && $_GET['p'] > 1) {
    $startPage = ((int) $_GET['p'] * $postByPage)+1;
}else{
    $startPage = 3;
}

$nPaginas = ceil((($posts->count)-3)/$postByPage);

$AllpostsByPage = PostsData::getAllByPage($startPage, $postByPage);
?>

<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
<section class="section first-section">
            <div class="container-fluid">
                <div class="masonry-blog clearfix">
                    
                    <div class="first-slot">
                        <div class="masonry-box post-media">
                            <!--Tamaño: 788x443-->
                             <img src="res/upload/788x443/<?php echo $lastPost->imageName ?>" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-orange"><a href="./?view=search&category=<?php echo $lastPost->category ?>" title=""><?php echo $lastPost->category; ?></a></span>
                                        <h4><a href="?view=top&post=<?php echo $lastPost->postID ?>" title=""><?php echo $lastPost->title ?></a></h4>
                                        <small><?php echo $lastPost->postDate2 ?></small>
                                        <small><?php echo $lastPost->username ?></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end first-side -->

                    <div class="second-slot">
                        <div class="masonry-box post-media">
                            <!--Tamaño: 394x449-->
                             <img src="res/upload/394x449/<?php echo $penultimatePost[0]->imageName ?>" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-orange"><a href="./?view=search&category=<?php echo $penultimatePost[0]->category ?>" title=""><?php echo $penultimatePost[0]->category ?></a></span>
                                        <h4><a href="?view=top&post=<?php echo $penultimatePost[0]->postID ?>" title=""><?php echo $penultimatePost[0]->title ?></a></h4>
                                        <small><?php echo $penultimatePost[0]->postDate2 ?></small>
                                        <small><?php echo $penultimatePost[0]->username ?></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                             </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end second-side -->

                    <div class="last-slot">
                        <div class="masonry-box post-media">
                            <!--Tamaño: 394x449-->
                             <img src="res/upload/394x449/<?php echo $penultimatePost[1]->imageName ?>" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-orange"><a href="./?view=search&category=<?php echo $penultimatePost[0]->category ?>" title=""><?php echo $penultimatePost[1]->category ?></a></span>
                                        <h4><a href="?view=top&post=<?php echo $penultimatePost[1]->postID ?>" title=""><?php echo $penultimatePost[1]->title ?></a></h4>
                                        <small><?php echo $penultimatePost[1]->postDate2 ?></small>
                                        <small><?php echo $penultimatePost[1]->username ?></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                             </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end second-side -->
                </div><!-- end masonry -->
            </div>
        </section>


        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-top clearfix">
                                <h4 class="pull-left">Últimos Tops <a href="#"><i class="fa fa-rss"></i></a></h4>
                            </div><!-- end blog-top -->

                            <div class="blog-list clearfix">
                            
                            <?php if ($AllpostsByPage) { 

                                foreach ($AllpostsByPage as $post) { ?>

                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="?view=top&post=<?php echo $post->postID ?>" title="">
                                                <!--Tamaño: 600x500-->
                                                <img src="res/upload/600x500/<?php echo $post->imageName ?>" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->
                                    <script type="text/javascript">alert(<?php echo $post->title; ?>);</script>
                                    <div class="blog-meta big-meta col-md-8">
                                        <h4><a href="?view=top&post=<?php echo $post->postID ?>" title=""><?php echo $post->title; ?></a></h4>
                                        <small class="firstsmall"><a class="bg-orange" href="./?view=search&category=<?php echo $post->category ?>" title=""><?php echo $post->category ?></a></small>
                                        <small><?php echo $post->postDate2 ?></small>
                                        <small><?php echo $post->username ?></small>
                                        <small><i class="fa fa-eye"></i> <?php echo $post->visitors ?></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">

                                <?php
                                    } 
                                } 
                                ?>

 
<!-------------------------------IMPORTANTE - BANNER PARA ANUNCIOS, NO BORRAR---------------------------->
                                <!--
                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <div class="banner-spot clearfix">
                                            <div class="banner-img">
                                                <img src="res/upload/banner_02.jpg" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="invis">-->
<!-------------------------------IMPORTANTE - BANNER PARA ANUNCIOS, NO BORRAR---------------------------->
                               
                                </div><!-- end blog-list -->
                            </div><!-- end page-wrapper -->

                            <hr class="invis">
<br><br><br><br><br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        
                                        <?php 

                                            if (isset($_GET['p']) && $_GET['p'] > 1) {
                                            echo '<li class="page-item"><a class="page-link" href="?p='.($_GET['p']-1).'">Anterior</a></li>';
                                            } 

                                            for ($i=1; $i <= $nPaginas; $i++) { 
                                                $val = "";
                                                if (isset($_GET['p']) && $_GET['p'] == $i) {
                                                    $val = "active";
                                                }
                                                echo '<li class="page-item '.$val.'"><a class="page-link" href="?p='.$i.'">'.$i.'</a></li>';
                                            }

                                            if (isset($_GET['p']) && $_GET['p'] < $nPaginas) {
                                                echo '<li class="page-item"><a class="page-link" href="?p='.($_GET['p']+1).'">Siguiente</a></li>';
                                            }


                                        ?>

                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->


                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">


<!-------------------------------IMPORTANTE - BANNER PARA ANUNCIOS, NO BORRAR---------------------------->
                            <!--<div class="widget">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="res/upload/banner_07.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>-->
<!-------------------------------IMPORTANTE - BANNER PARA ANUNCIOS, NO BORRAR---------------------------->
    
                            <!-- VIDEOS
                            <div class="widget">
                                <h2 class="widget-title">Videos</h2>
                                <div class="trend-videos">
                                    <div class="blog-box">
                                        <div class="post-media">
                                            <a href="tech-single.html" title="">
                                                <img src="res/upload/tech_video_03.jpg" alt="" class="img-fluid">
                                                <div class="hovereffect">
                                                    <span class="videohover"></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="blog-meta">
                                            <h4><a href="tech-single.html" title="">Both blood pressure monitor and intelligent clock</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <div class="widget">
                                <div class="w-100 justify-content-between">
                                    <img src="res/upload/600x500/default.jpg" alt="" class="img-fluid float">
                                    <div class="hovereffect"></div>
                                </div>
                            </div>

                            <div class="widget">
                                <h2 class="widget-title">Más Vistos Histórico</h2>
                                <div class="blog-list-widget">

                                    <?php 
                                    $mostViewed = PostsData::getMostViewed();
                                    foreach ($mostViewed as $mv) { ?>
                                        <div class="list-group">    
                                            <a href="?view=top&post=<?php echo $mv->postID ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 justify-content-between">
                                                    <img src="res/upload/600x500/<?php echo $mv->imageName ?>" alt="" class="img-fluid float-left">
                                                    <h5 class="mb-1"><?php echo $mv->title ?></h5>
                                                    <small><?php echo $mv->postDate2.' / '; ?></small>
                                                    <small><i class="fa fa-eye"></i><?php echo $mv->visitors ?></small>
                                                </div>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->
                        
                        <!--
                            <div class="widget">
                                <h2 class="widget-title">Siguenos</h2>

                                <div class="row text-center">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="#" class="social-button facebook-button">
                                            <i class="fa fa-facebook"></i>
                                            <p>27k</p>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="#" class="social-button twitter-button">
                                            <i class="fa fa-twitter"></i>
                                            <p>98k</p>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="#" class="social-button google-button">
                                            <i class="fa fa-google-plus"></i>
                                            <p>17k</p>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="#" class="social-button youtube-button">
                                            <i class="fa fa-youtube"></i>
                                            <p>22k</p>
                                        </a>
                                    </div>
                                </div>
                            </div>-->

<!-------------------------------IMPORTANTE - BANNER PARA ANUNCIOS, NO BORRAR---------------------------->
                            <!--
                            <div class="widget">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="res/upload/banner_03.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>-->
<!-------------------------------IMPORTANTE - BANNER PARA ANUNCIOS, NO BORRAR---------------------------->
                            
                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>        