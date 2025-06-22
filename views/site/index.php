<?php

/* @var $this yii\web\View */
$id = '5';
//$this->title = 'Main';
use app\assets\AppAsset;
use app\models\Posts;
$posts_recent = Posts::find()->orderBy(['id' => SORT_DESC])->asArray()->where(['type' => ''])->limit(50)->all();
?>






    <!--<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <nav class="site-nav">
    <div class="container">
      <div class="menu-bg-wrap">
        <div class="site-navigation">
          <div class="row g-0 align-items-center">
            <div class="col-2">
              <a href="index.html" class="logo m-0 float-start">Blogy<span class="text-primary">.</span></a>
            </div>
            <div class="col-8 text-center">
              <form action="#" class="search-form d-inline-block d-lg-none">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="bi-search"></span>
              </form>

              <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                <li class="active"><a href="index.html">Home</a></li>
                <li class="has-children">
                  <a href="category.html">Pages</a>
                  <ul class="dropdown">
                    <li><a href="search-result.html">Search Result</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="single.html">Blog Single</a></li>
                    <li><a href="category.html">Category</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li class="has-children">
                      <a href="#">Dropdown</a>
                      <ul class="dropdown">
                        <li><a href="#">Sub Menu One</a></li>
                        <li><a href="#">Sub Menu Two</a></li>
                        <li><a href="#">Sub Menu Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="category.html">Culture</a></li>
                <li><a href="category.html">Business</a></li>
                <li><a href="category.html">Politics</a></li>
              </ul>
            </div>
            <div class="col-2 text-end">
              <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                <span></span>
              </a>
              <form action="#" class="search-form d-none d-lg-inline-block">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="bi-search"></span>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>-->

  <!-- Start retroy layout blog posts -->
  <section class="section bg-light">
    <div class="container">
      <div class="row align-items-stretch retro-layout">
        <div class="col-md-4">
          <a href="/postsingle#<?=$posts_recent[0]['id']?>" class="h-entry mb-30 v-height gradient">

            <div class="featured-img" style="background-image: url(<?=$posts_recent[0]['img_path']?>);"></div>

            <div class="text">
              <span class="date"><?=$posts_recent[0]['date']?></span>
              <h2><?=$posts_recent[0]['title']?></h2>
            </div>
          </a>
          <a href="/postsingle#<?=$posts_recent[1]['id']?>" class="h-entry v-height gradient">

            <div class="featured-img" style="background-image: url(<?=$posts_recent[1]['img_path']?>);"></div>

            <div class="text">
              <span class="date"><?=$posts_recent[1]['date']?></span>
              <h2><?=$posts_recent[1]['title']?></h2>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="/postsingle#<?=$posts_recent[2]['id']?>" class="h-entry img-5 h-100 gradient">

            <div class="featured-img" style="background-image: url(<?=$posts_recent[2]['img_path']?>);"></div>

            <div class="text">
              <span class="date"><?=$posts_recent[2]['date']?></span>
              <h2><?=$posts_recent[2]['title']?></h2>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="/postsingle#<?=$posts_recent[3]['id']?>" class="h-entry mb-30 v-height gradient">

            <div class="featured-img" style="background-image: url(<?=$posts_recent[3]['img_path']?>);"></div>

            <div class="text">
              <span class="date"><?=$posts_recent[3]['date']?></span>
              <h2><?=$posts_recent[3]['title']?></h2>
            </div>
          </a>
          <a href="/postsingle#<?=$posts_recent[4]['id']?>" class="h-entry v-height gradient">

            <div class="featured-img" style="background-image: url(<?=$posts_recent[4]['img_path']?>);"></div>

            <div class="text">
              <span class="date"><?=$posts_recent[4]['date']?></span>
              <h2><?=$posts_recent[4]['title']?></h2>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- End retroy layout blog posts -->

  <!-- Start posts-entry -->
  <section class="section posts-entry">
    <div class="container">
      <div class="row mb-4">
        <div class="col-sm-6">
          <h2 class="posts-entry-title">Popular</h2>
        </div>
        <div class="col-sm-6 text-sm-end"><a href="/allposts" class="read-more">View All</a></div>
      </div>
      <div class="row g-3 img-blog-main-lg">
        <div class="col-md-9">
          <div class="row g-3">
            <div class="col-md-6">
              <div class="blog-entry">
                <a href="/postsingle#<?=$posts_recent[5]['id']?>" class="img-link">
                  <img src="<?=$posts_recent[5]['img_path']?>" alt="Image" class="img-fluid">
                </a>
                <span class="date"><?=$posts_recent[5]['date']?></span>
                <h2><a href="/postsingle#<?=$posts_recent[5]['id']?>"><?=$posts_recent[5]['title']?></a></h2>
                <p>@<?=$posts_recent[5]['nickname']?></p>
                <p><a href="/postsingle#<?=$posts_recent[5]['id']?>" class="btn btn-sm btn-outline-primary">Read More</a></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="blog-entry">
                <a href="/postsingle#<?=$posts_recent[6]['id']?>" class="img-link">
                  <img src="<?=$posts_recent[6]['img_path']?>" alt="Image" class="img-fluid">
                </a>
                <span class="date"><?=$posts_recent[6]['date']?></span>
                <h2><a href="/postsingle#<?=$posts_recent[6]['id']?>"><?=$posts_recent[6]['title']?></a></h2>
                <p>@<?=$posts_recent[6]['nickname']?></p>
                <p><a href="/postsingle#<?=$posts_recent[6]['id']?>" class="btn btn-sm btn-outline-primary">Read More</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <ul class="list-unstyled blog-entry-sm">
            <li>
              <span class="date"><?=$posts_recent[7]['date']?></span>
              <h3><a href="/postsingle#<?=$posts_recent[7]['id']?>"><?=$posts_recent[7]['title']?></a></h3>
              <p>@<?=$posts_recent[7]['nickname']?></p>
              <p><a href="/postsingle#<?=$posts_recent[7]['id']?>" class="read-more">Continue Reading</a></p>
            </li>

            <li>
              <span class="date"><?=$posts_recent[8]['date']?></span>
              <h3><a href="/postsingle#<?=$posts_recent[8]['id']?>"><?=$posts_recent[8]['title']?></a></h3>
              <p>@<?=$posts_recent[8]['nickname']?></p>
              <p><a href="/postsingle#<?=$posts_recent[8]['id']?>" class="read-more">Continue Reading</a></p>
            </li>

            <li>
              <span class="date"><?=$posts_recent[9]['date']?></span>
              <h3><a href="/postsingle#<?=$posts_recent[9]['id']?>"><?=$posts_recent[9]['title']?></a></h3>
              <p>@<?=$posts_recent[9]['nickname']?></p>
              <p><a href="/postsingle#<?=$posts_recent[9]['id']?>" class="read-more">Continue Reading</a></p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End posts-entry -->

  <!-- Start posts-entry -->
  <section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
      <div class="row img-blog-main">
        <div class="col-md-6 col-lg-3">
          <div class="blog-entry">
            <a href="/postsingle#<?=$posts_recent[10]['id']?>" class="img-link">
              <img src="<?=$posts_recent[10]['img_path']?>" alt="Image" class="img-fluid">
            </a>
            <span class="date"><?=$posts_recent[10]['date']?></span>
            <h2><a href="/postsingle#<?=$posts_recent[10]['id']?>"><?=$posts_recent[10]['title']?></a></h2>
            <p>@<?=$posts_recent[10]['nickname']?></p>
            <p><a href="/postsingle#<?=$posts_recent[10]['id']?>" class="read-more">Continue Reading</a></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="blog-entry">
            <a href="/postsingle#<?=$posts_recent[11]['id']?>" class="img-link">
              <img src="<?=$posts_recent[11]['img_path']?>" alt="Image" class="img-fluid">
            </a>
            <span class="date"><?=$posts_recent[11]['date']?></span>
            <h2><a href="/postsingle#<?=$posts_recent[11]['id']?>"><?=$posts_recent[11]['title']?></a></h2>
            <p>@<?=$posts_recent[11]['nickname']?></p>
            <p><a href="/postsingle#<?=$posts_recent[11]['id']?>" class="read-more">Continue Reading</a></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="blog-entry">
            <a href="/postsingle#<?=$posts_recent[12]['id']?>" class="img-link">
              <img src="<?=$posts_recent[12]['img_path']?>" alt="Image" class="img-fluid">
            </a>
            <span class="date"><?=$posts_recent[12]['date']?></span>
            <h2><a href="/postsingle#<?=$posts_recent[12]['id']?>"><?=$posts_recent[12]['title']?></a></h2>
            <p>@<?=$posts_recent[12]['nickname']?></p>
            <p><a href="/postsingle#<?=$posts_recent[12]['id']?>" class="read-more">Continue Reading</a></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="blog-entry">
            <a href="/postsingle#<?=$posts_recent[13]['id']?>" class="img-link">
              <img src="<?=$posts_recent[13]['img_path']?>" alt="Image" class="img-fluid">
            </a>
            <span class="date"><?=$posts_recent[13]['date']?></span>
            <h2><a href="/postsingle#<?=$posts_recent[13]['id']?>"><?=$posts_recent[13]['title']?></a></h2>
            <p>@<?=$posts_recent[13]['nickname']?></p>
            <p><a href="/postsingle#<?=$posts_recent[13]['id']?>" class="read-more">Continue Reading</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <div class="section bg-light">
    <div class="container">

      <div class="row mb-4">
        <div class="col-sm-6">
          <h2 class="posts-entry-title">Pets Travel</h2>
        </div>
        <div class="col-sm-6 text-sm-end"><a href="/allposts" class="read-more">View All</a></div>
      </div>

      <div class="row align-items-stretch retro-layout-alt">

        <div class="col-md-5 order-md-2">
          <a href="/postsingle#<?=$posts_recent[14]['id']?>" class="hentry img-1 h-100 gradient">
            <div class="featured-img" style="background-image: url('<?=$posts_recent[14]['img_path']?>');"></div>
            <div class="text">
              <span><?=$posts_recent[14]['date']?></span>
              <h2><?=$posts_recent[14]['title']?></h2>
            </div>
          </a>
        </div>

        <div class="col-md-7">

          <a href="/postsingle#<?=$posts_recent[15]['id']?>" class="hentry img-2 v-height mb30 gradient">
            <div class="featured-img" style="background-image: url('<?=$posts_recent[15]['img_path']?>');"></div>
            <div class="text text-sm">
              <span><?=$posts_recent[15]['date']?></span>
              <h2><?=$posts_recent[15]['title']?></h2>
            </div>
          </a>

          <div class="two-col d-block d-md-flex justify-content-between">
            <a href="/postsingle#<?=$posts_recent[16]['id']?>" class="hentry v-height img-2 gradient">
              <div class="featured-img" style="background-image: url('<?=$posts_recent[16]['img_path']?>');"></div>
              <div class="text text-sm">
                <span><?=$posts_recent[16]['date']?></span>
                <h2><?=$posts_recent[16]['title']?></h2>
              </div>
            </a>
            <a href="/postsingle#<?=$posts_recent[17]['id']?>" class="hentry v-height img-2 ms-auto float-end gradient">
              <div class="featured-img" style="background-image: url('<?=$posts_recent[17]['img_path']?>');"></div>
              <div class="text text-sm">
                <span><?=$posts_recent[17]['date']?></span>
                <h2><?=$posts_recent[17]['title']?></h2>
              </div>
            </a>
          </div>  

        </div>
      </div>

    </div>
  </div>



  

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
   
          
      
</main>
    