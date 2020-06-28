<?php

//$postExist = PostsData::ifPostExist($_GET['post']);

if (isset($_GET['post']) && $_GET['post'] != '' && is_numeric($_GET['post'])) {
    $post = PostsData::getById($_GET['post']);
    if (!$post->postID) {
        Core::redir('?view=error404');
    }
}else{
    Core::redir('?view=error404');
}

//Add View
PostsData::addView($_GET['post']);
?>
        <section class="section single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area text-center">
                                <ol class="breadcrumb hidden-xs-down">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">Tops</a></li>
                                    <li class="breadcrumb-item active"><?php echo $post->title ?></li>
                                </ol>

                                <span class="color-orange"><a href="?view=search&category=<?php echo $post->category ?>" title=""><?php echo $post->category ?></a></span>

                                <h3><?php echo $post->title ?></h3>

                                <div class="blog-meta big-meta">
                                    <small><?php echo $post->postDate2 ?></small>
                                    <small><?php echo $post->username ?></small>
                                    <small><i class="fa fa-eye"></i><?php echo $post->visitors ?></small>
                                </div><!-- end meta -->
                                
                                <!-- SOCIAL -->
                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="http://www.facebook.com/share.php?u=<?php echo ROOT; ?>/?view=top&post=<?php echo $post->postID ?>" class="fb-button btn btn-primary" target="_blank"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>

                                        <li><a href="https://twitter.com/share?url=<?php echo ROOT; ?>/?view=top&post=<?php echo $post->postID ?>&amp;text=<?php echo $post->title ?>&amp;hashtags=#Top10" class="tw-button btn btn-primary" target="_blank"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        
                                        <li><a href="https://plus.google.com/share?url=<?php echo ROOT; ?>/?view=top&post=<?php echo $post->postID ?>" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div><!-- end title -->

                            <div class="blog-content">

                                <img src="res/upload/788x443/<?php echo $post->imageName ?>" alt="" class="img-fluid img-fullwidth">

                                <div class="pp">
                                    <p><?php echo $post->body ?></p>
                                </div><!-- end pp -->
                            </div><!-- end content -->

                            <div class="blog-title-area">
                                <!-- TAGS
                                <div class="tag-cloud-single">
                                    <span>Tags</span>
                                    <small><a href="#" title=""><?php echo $post->tags ?></a></small>
                                    <small><a href="#" title="">lifestyle</a></small>
                                    <small><a href="#" title="">colorful</a></small>
                                    <small><a href="#" title="">trending</a></small>
                                    <small><a href="#" title="">another tag</a></small>
                                </div>
                                |-->
                                <!-- post-sharing 
                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>-->
                            </div><!-- end title -->

<!-------------------------------IMPORTANTE - BANNER PARA ANUNCIOS, NO BORRAR---------------------------->
                            <!--<div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-spot clearfix">
                                        <div class="banner-img">
                                            <img src="res/upload/banner_01.jpg" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>-->
<!-------------------------------IMPORTANTE - BANNER PARA ANUNCIOS, NO BORRAR---------------------------->

                            <hr class="invis1">

                            
                            <div class="custombox prevnextpost clearfix">
                                <div class="row">
                                    
                                    <?php 
                                        $prevPost = PostsData::getById($_GET['post']-1); 
                                        if ($prevPost) {
                                    ?>
                                    <div class="col-lg-6">
                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="?view=top&post=<?php echo $prevPost->postID ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between text-right">
                                                        <img src="res/upload/788x443/<?php echo $prevPost->imageName ?>" alt="" class="img-fluid float-right">
                                                        <h5 class="mb-1"><?php echo $prevPost->title ?></h5>
                                                        <small>Prev Post</small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <?php } ?>
                                    <?php 
                                        $nextPost = PostsData::getById($_GET['post']+1); 
                                        if ($nextPost) { ?>
                                            <div class="col-lg-6">
                                                <div class="blog-list-widget">
                                                    <div class="list-group">
                                                        <a href="?view=top&post=<?php echo $nextPost->postID ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                            <div class="w-100 justify-content-between">
                                                                <img src="res/upload/788x443/<?php echo $nextPost->imageName ?>" alt="" class="img-fluid float-left">
                                                                <h5 class="mb-1"><?php echo $nextPost->title ?></h5>
                                                                <small>Next Post</small>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        <?php } ?>
                    
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">

<!-------------------------------IMPORTANTE - SOBRE EL AUTOR, NO BORRAR---------------------------->
                            <!--<div class="custombox authorbox clearfix">
                                <h4 class="small-title">About author</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="res/upload/author.jpg" alt="" class="img-fluid rounded-circle"> 
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#">Jessica</a></h4>
                                        <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Tech Blog!</p>

                                        <div class="topsocial">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <hr class="invis1">-->
<!-------------------------------IMPORTANTE - SOBRE EL AUTOR, NO BORRAR---------------------------->

                            <div class="custombox clearfix">
                                <h4 class="small-title">Tambien te podría interesar</h4>
                                <div class="row">

                                    <?php $postsSug = PostsData::getAllPostFiltered($post->category, '', $post->postID, 0, 2); 
                                    foreach ($postsSug as $ps) { ?>
                                         
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="./?view=top&post=<?php echo $ps->postID ?>" title="">
                                                    <img src="res/upload/788x443/<?php echo $ps->imageName ?>" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="blog-meta">
                                                <h4><a href="./?view=top&post=<?php echo $ps->postID ?>" title=""><?php echo $ps->title ?></a></h4>
                                                <small><a href="blog-category-01.html" title=""><?php echo $ps->category ?></a></small>
                                                <small><a href="blog-category-01.html" title=""><?php echo $ps->postDate2 ?></a></small>
                                            </div>
                                        </div>
                                    </div>

                                    <?php } ?>

                                </div>
                            </div>

                            <hr class="invis1">
                        


<!-------------------------------IMPORTANTE - COMENTARIOS, NO BORRAR---------------------------->
                            <!--<div class="custombox clearfix">
                                <h4 class="small-title">3 Comments</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="res/upload/author.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name">Amanda Martines <small>5 days ago</small></h4>
                                                    <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone Kickstarter, drinking vinegar jean.</p>
                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="res/upload/author_01.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">

                                                    <h4 class="media-heading user_name">Baltej Singh <small>5 days ago</small></h4>

                                                    <p>Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                            <div class="media last-child">
                                                <a class="media-left" href="#">
                                                    <img src="res/upload/author_02.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">

                                                    <h4 class="media-heading user_name">Marie Johnson <small>5 days ago</small></h4>
                                                    <p>Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">Leave a Reply</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-wrapper">
                                            <input type="text" class="form-control" placeholder="Your name">
                                            <input type="text" class="form-control" placeholder="Email address">
                                            <input type="text" class="form-control" placeholder="Website">
                                            <textarea class="form-control" placeholder="Your comment"></textarea>
                                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>-->
<!-------------------------------IMPORTANTE - COMENTARIOS, NO BORRAR---------------------------->
                        </div><!-- end page-wrapper -->
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
                                <h2 class="widget-title">Ultimos Posts</h2>
                                <div class="blog-list-widget">

                                    <?php 
                                    $last5Posts = PostsData::getAllByPage(0, 5);
                                    foreach ($last5Posts as $lp) { ?>
                                        <div class="list-group">    
                                            <a href="?view=top&post=<?php echo $lp->postID ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 justify-content-between">
                                                    <img src="res/upload/600x500/<?php echo $lp->imageName ?>" alt="" class="img-fluid float-left">
                                                    <h5 class="mb-1"><?php echo $lp->title ?></h5>
                                                    <small><?php echo $lp->postDate2 ?></small>
                                                    <small><i class="fa fa-eye"></i><?php echo $lp->visitors ?></small>
                                                </div>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

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
                                                    <small><?php echo $mv->postDate2 ?></small>
                                                    <small><i class="fa fa-eye"></i><?php echo $mv->visitors ?></small>
                                                </div>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                        <!-- SOCIAL
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
