<?php

use app\assets\AppAsset;

use yii\helpers\Html;
use app\models\Login;
use app\models\Posts;
use app\components\Uservaludate;

$login_model = new Login();
//$posts = new Posts();

$now = new DateTime();
$current_year = substr($now->format('Y-m-d H:i:s'), 0, 4);
                    

$isAdmin = false;

$cookies = Yii::$app->request->cookies;

if(empty(Yii::$app->params['lang'])){
    $lang = Uservaludate::CookieLang();
}
else{
    $lang = Yii::$app->params['lang'];
}

if($lang == 'ru'){
    $main = 'Главная';
    $service = 'Админ';
    $gallery = 'Галерея';
    $calendar = 'Расписание';
    $article = 'Статьи';
    $contact = 'Контакты';
    $regulations = 'Правила';
    $video = 'Видео';
    $port = 'Портфолио';
    $sendmail = 'Почта';
    $sendmailfile = 'Почта файл';
}
else{
    $main = 'Peamine';
    $service = 'Teenused';
    $gallery = 'Galerii';
    $calendar = 'Kalender';
    $article = 'Artiklid';
    $contact = 'Kontakt';
    $regulations = 'eeskirjadega';
    $video = 'Video';
    $port = 'Portfolio';
}


if($lang == 'ee'){
    $add = '/ee';
}
else{
    $add = '';
}


////////админ //disable database
/*if (($cookie = $cookies->get('admin')) !== null) {
    $email = $cookie->value;
    $pr_admin = Login::find()->asArray()->where(['username' => $email])->one();
}
if (($cookie = $cookies->get('auth_key')) !== null) {
    $auth_key = $cookie->value;
}*/

$posts_recent = Posts::find()->orderBy(['id' => SORT_DESC])->asArray()->where(['type' => ''])->limit(3)->all();


$user_signin = false;
if(Uservaludate::validateUserAccount()){
  $isAdmin = true;
  $user_signin = true;
}
/*if(!empty($pr_admin)){
    if(strcasecmp($pr_admin['auth_key'], $auth_key) == 0){
    $isAdmin = true;
}
}*/

$isModerator = false;
$pr_moderator = false;

/////модератор
/*if (($cookie = $cookies->get('moderator')) !== null) {
    $email = $cookie->value;
    $pr_moderator = Login::find()->asArray()->where(['username' => $email])->one();
}
if (($cookie = $cookies->get('auth_key')) !== null) {
    $auth_key = $cookie->value;
}


if(!empty($pr_moderator)){
    if(strcasecmp($pr_moderator['auth_key'], $auth_key) == 0){
    $isModerator = true;
}
}*/



AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="yff5zm2oaM_IAfG7ARFyCbYEnskO4b1jPXs6ZTWWi4g" />
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
  <link rel="shortcut icon" href="../web/FurPawsTopia_pic.ico" type="image/x-icon">
</head>
<body>
   <?php $this->beginBody() ?>

    <main id="app">

      <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editmodalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
  <label for="editFormControlTextarea1" class="form-label">Изменить</label>
  <textarea class="form-control" id="editFormControlTextarea1" rows="3" v-model="edittext">
    
  </textarea>
</div>
      </div>
      <div class="modal-footer">
        <button id="close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button id="save" type="button" class="btn btn-primary" v-on:click="editaxios">Сохранить</button>
      </div>
    </div>
  </div>
</div>  


<div class="modal fade" id="subscription_modal" tabindex="-1" aria-labelledby="subscription_modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="subscription_modal">Premium subscription</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img src="/web/img/icon/Dh7U4bp.png" width="200">
          <p>🚫 Ad-Free Experience</p>
          <p>⚡ Priority Customer Support</p>
          <p>🛍️ Expanded Listings</p>
          <p>☁️ Cloud Storage</p>
          <p>📆 Social Content Planner</p>
          <button type="button" class="btn btn-secondary">Buy premium</button> <br><br>
          <button type="button" class="btn btn-primary">Start a free trial</button>
        </div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Start a free trial</button>
      </div>-->
    </div>
  </div>
</div>


<div class="modal fade" id="not_available" tabindex="-1" aria-labelledby="not_available" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="not_available">Not available</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img src="/web/img/icon/work_in_progress.jpg" width="200">
          <p class="mt-3">We're sorry but this function is not currently available. Rest assure we will add to the final version</p>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="site-mobile-menu site-navbar-target">
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
              <a href="#" class="logo m-0 float-start" style="overflow-wrap: break-word;">Fur&PawsTopia 
                <!--<i class="fa-solid fa-paw"></i>-->
              </a>
            </div>
            <div class="col-8 text-center">
              <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                <li class="active"><a href="/">Home</a></li>
                <?php if($user_signin == true): ?>
                <!--  <li><a href="/site/addpost">Add post</a></li>
                  <li><a href="/site/addphoto">Add img</a></li>-->
                  <li><a href="/market">Marketplace</a></li>
                  <li><a href="/allposts">Posts</a></li>
                  <li><a href="/events">Events</a></li>
                  <li><a href="/chat">Chat</a></li>
                 <!-- <li><a href="/gallery">Gallery</a></li>-->
                  <li><a href="/calendar">Calendar</a></li>
                  <li><a href="/settings">Settings</a></li>
                  <li><a href="/profile">Profile</a></li>
                  <li><a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#subscription_modal">Subscription</a></li>
                  <li><a href="/site/logexit">Logout</a></li>
                <?php else: ?>
                  <li><a href="/login">Sign in</a></li>
                <?php endif; ?>
              </ul>
            </div>
            <div class="col-2 text-end">
              <a class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                <span></span>
              </a>
              <?php if($user_signin == true): ?>
             <!-- <form action="#" class="search-form d-none d-lg-inline-block">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="bi-search"></span>
              </form>-->
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
    
  
    
   
 
    </nav>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change pass</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div :disabled='isDisabled' class="forms-inputs mb-4"> <span>Your current pass</span> <input type="password" v-model="password" v-bind:class="{'form-control':true, 'is-invalid' : (!validPassword(password) && passwordBlured) || (error && passwordBlured)}" v-on:blur="passwordBlured = true">
                        <div class="invalid-feedback">{{password_error}}</div>
                    </div>

                    <div :disabled='isDisabled' class="forms-inputs mb-4"> <span>New pass</span> <input type="password" v-model="passwordchange" v-bind:class="{'form-control':true, 'is-invalid' : (!validPassword(passwordchange) && passwordchangeBlured) || (error && passwordchangeBlured)}" v-on:blur="passwordchangeBlured = true">
                        <div class="invalid-feedback">{{password_error}}</div>
                    </div>

                    <div :disabled='isDisabled' class="forms-inputs mb-4"> <span>New pass again</span> <input type="password" v-model="passwordchangeagain" v-bind:class="{'form-control':true, 'is-invalid' : (!validPassword(passwordchangeagain) && passwordchangeagainBlured) || (error && passwordchangeagainBlured)}" v-on:blur="passwordchangeagainBlured = true">
                        <div class="invalid-feedback">{{password_error}}</div>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-dark" :disabled='isDisabled' @click="changepass">Change</button>
      </div>
    </div>
  </div>
</div>
        
       
        
            
        <div class="modal-menu"></div>
        
        
        
             
                  <?= $content ?>
              
      
    <?php $this->endBody() ?>
   <!-- Footer -->

<footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="widget">
            <h3 class="mb-4">About</h3>
            <p>Social media for pets</p>
          </div> <!-- /.widget -->
          <div class="widget">
            <h3>Social</h3>
            <ul class="list-unstyled social">
              <li><a href="#"><span class="fa-brands fa-facebook"></span></a></li>
              <li><a href="#"><span class="fa-brands fa-instagram"></span></a></li>
              <li><a href="#"><span class="fa-brands fa-telegram"></span></a></li>
              
            </ul>
          </div> <!-- /.widget -->
        </div> <!-- /.col-lg-4 -->
        <div class="col-lg-4 ps-lg-5">
          <div class="widget">
            <h3 class="mb-4">fur&PawsTopia <i class="fa-solid fa-paw"></i></h3>
            <ul class="list-unstyled float-start links">
              <li><a href="#">Profile</a></li>
              <!--<li><a href="#">Gallery</a></li>-->
              <li><a href="#">Calendar</a></li>
              <li><a href="#">Setting</a></li>
            </ul>
            <ul class="list-unstyled float-start links">
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Terms</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">FAQ</a></li>

            </ul>
          </div> <!-- /.widget -->
        </div> <!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <div class="widget">
            <h3 class="mb-4">Recent Post Entry</h3>
            <div class="post-entry-footer">
              <ul>
                <?php foreach($posts_recent as $post): ?>
                <li>
                  <a href="/postsingle#<?=$post['id']?>">
                    <img src="<?='/'.$post['img_path']?>" alt="Image placeholder" class="me-4 rounded img-cover-post">
                    <div class="text">
                      <h4><?=$post['title']?></h4>
                      <div class="post-meta">
                        <span class="mr-2"><?=$post['nickname']?> </span>
                      </div>
                    </div>
                  </a>
                </li>
                 <?php endforeach; ?>
               <!-- <li>
                  <a href="">
                    <img src="images/img_2_sq.jpg" alt="Image placeholder" class="me-4 rounded">
                    <div class="text">
                      <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                      <div class="post-meta">
                        <span class="mr-2">March 15, 2018 </span>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="images/img_3_sq.jpg" alt="Image placeholder" class="me-4 rounded">
                    <div class="text">
                      <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                      <div class="post-meta">
                        <span class="mr-2">March 15, 2018 </span>
                      </div>
                    </div>
                  </a>
                </li>-->
              </ul>
            </div>


          </div> <!-- /.widget -->
        </div> <!-- /.col-lg-4 -->
      </div> <!-- /.row -->

      <div class="row mt-5">
        <div class="col-12 text-center">
          <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

    
          </div>
        </div>
      </div> <!-- /.container -->
    </footer> <!-- /.site-footer -->

  
</body>
</html>
<?php $this->endPage() ?>
