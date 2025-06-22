<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Login;
use app\models\Breed;
use app\models\Type;
use app\models\Posts;
use app\models\Market;
use app\models\Categories;
use app\components\Uservaludate;
use app\components\Bottelegram;
use yii\helpers\Url;


class SiteController extends AppController
{
    public $enableCsrfValidation = false; //Если это включить то axios работает
    
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(  Uservaludate::validateCookieModerator() ){
            $moderator = true;
        }
        else{
            $moderator = false;
        }

//$new_pass = Uservaludate::createNewAccount('mail5@gmail.com', 'golden retriver', 'test', 'gold', '/web/img','dog','Passtest');

        if(  Uservaludate::validateUserAccount() ){
            //validateCookie
            $signin = true;
        }
        else{
            $signin = false;
        }


        if($signin){

        

        /*Yii::$app->mailer->compose()
            ->setFrom('from@domain.com')
            ->setTo('ip557799@gmail.com')
            ->setSubject('Message subject')
            ->setTextBody('Plain text content')
            ->setHtmlBody('<b>HTML content</b>')
            ->send();*/
        //axios reguest
        if (Yii::$app->request->isPost){
            if($signin){
            $_POST = json_decode(file_get_contents('php://input'), true);
            if(!empty($_POST['id']) && !empty($_POST['edittext'])){
                if($_POST['target'] == 'change'){
                    //Код для добавления в БД
                //Yii::$app->db->createCommand()->update('user', ['text' => $_POST['edittext']], 'id = '.$_POST['id'])->execute();

                /*update = Training::findone($_POST['id']);
                $update->text = $_POST['edittext';
                $update->save();*/

                  return 'Текст успешно изменен '.$_POST['edittext'];  
                } 
                if($_POST['target'] == 'select'){
                  //Код для вывода из БД, где return - данные для заполнения

                //$return = Training::find()->asArray()->where(['id' => $_POST['id']])->one();
                    //$return = $return['text'];
                    $return = 'Текст для заполнения';
                  return $return;  
                }   
            }
            }
        }
 
        $lang = Uservaludate::routing_lang();

            $title = "Furpawstopia - prototype";
            $keywords = 'keywords';
            $description = 'description';
        
        
         $this->view->title = $title;
         $this->view->registerMetaTag(['name' => 'keywords', 'content' => $keywords]);
         $this->view->registerMetaTag(['name' => 'description', 'content' => $description]);

    
            return $this->render('index', compact('lang'));
            }
            else{
            return $this->redirect('/login');
        }
    }

    public function actionSignup()
    {
        $sql_limit = 1000;
        if (Yii::$app->request->isPost){
            $_POST = json_decode(file_get_contents('php://input'), true);
            if($_POST['target'] == 'select_breed'){
                //$pr_breed = Breed::find()->asArray()->where(['name' => $breed])->one();
                $pr_breed = Breed::find()->orderBy(['id' => SORT_ASC])->asArray()->limit($sql_limit)->all();

                $pr_breed = json_encode($pr_breed);
                return $pr_breed;
            }
            if($_POST['target'] == 'select_type'){
               
                $pr_type = Type::find()->orderBy(['id' => SORT_ASC])->asArray()->limit($sql_limit)->all();

                $pr_type = json_encode($pr_type);
                return $pr_type;
            }
            if($_POST['target'] == 'createnewaccount'){
                $pr_user_acc = Login::find()->asArray()->where(['username' => $_POST['email']])->one();
                if(!empty($pr_user_acc)){
                    return 'username '.$_POST['email'].' has already exist controller';
                }
                else{
                    $account = Uservaludate::createNewAccount($_POST['email'], $_POST['breed'], $_POST['description'], $_POST['color'], '',$_POST['type'],$_POST['password'],$_POST['name'], $_POST['nickname']);
                 if(!$account){
                    $name = "login";
                    $pr_username = Login::find()->asArray()->where(['username' => $_POST['email']])->one();

                    if(!empty($pr_username)){
                        $cookies = Yii::$app->response->cookies;
                        
                        $cookies->add( new \yii\web\Cookie([
                            'name' => $name,
                            'value' => $pr_username['username'],
                            'expire' => time() + 86400 * 365,
                        ]));
                        $cookies->add( new \yii\web\Cookie([
                            'name' => 'auth_key',
                            'value' => $pr_username['auth_key_hash'],
                            'expire' => time() + 86400 * 365,
                        ]));
                        return 'account has been created';
                    }
                    else{
                        return 'account has been created you may sign in now';
                    }
    
                        
                 }
                 else{
                    return $account;
                 }
                }
                
            }
        }
        //$new_pass = Uservaludate::createNewAccount('mail5@gmail.com', 'golden retriver', 'test', 'gold', '/web/img','dog','Passtest');
        return $this->render('signup');
    }


    public function actionAddproduct()
    {
        if(  Uservaludate::validateCookieModerator() ){
            $moderator = true;
        }
        else{
            $moderator = false;
        }


        if(  Uservaludate::validateUserAccount() ){
            $admin = true;
        }
        else{
            $admin = false;
        }
        if($admin){
        if (Yii::$app->request->isPost && $admin) {
    try {
        $files = $_FILES; 
        $done_files = [];
        $errors = [];

        if (!empty($files)) {
            foreach ($files as $file) {
               
                if (empty(trim($_POST['title'])) || empty(trim($_POST['text'])) || empty(trim($_POST['price'])) || empty(trim($_POST['category_id']))) {
                    $errors[] = 'Заполните название и текст';
                }
                if ($file['size'] == 0) {
                    $errors[] = 'Загрузите файл';
                }

              
                if (!empty(trim($_POST['category_id']))) {
                    $category_id = (int) $_POST['category_id'];
                    $category = Categories::find()->asArray()->where(['id' => $category_id])->one();
                    if (!$category) {
                        $errors[] = "Category not found";
                    }
                }

               
                $imageinfo = getimagesize($file['tmp_name']);
                $allowed_formats = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp', 'image/gif'];

                if (!in_array($imageinfo['mime'], $allowed_formats)) {
                    $errors[] = "Img has to be JPG, PNG, WEBP, or GIF";
                }

                if (empty($errors)) {
                    
                    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $file_name = uniqid() . '.' . $ext; 

                    if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/web/img/market/' . $file_name)) {
                        $date_now = date('Y-m-d');

                        
                        $cookies = Yii::$app->request->cookies;
                        if (($cookie = $cookies->get('login')) !== null) {
                            $email = $cookie->value;
                            $user_info = Login::find()->asArray()->where(['username' => $email])->one();
                        }

                        Yii::$app->db->createCommand()->insert('market', [
                            'title' => $_POST['title'],
                            'description' => $_POST['text'],
                            'path' => '/web/img/market/' . $file_name,
                            'date' => $date_now,
                            'price' => $_POST['price'],
                            'category_id' => $category_id,
                            'category' => $category['name'],
                            'nickname' => $user_info['nickname'],
                            'avatar_path' => $user_info['img_path'],
                            'profile_description' => $user_info['description'],
                            'user_id' => $user_info['id'],
                        ])->execute();

                        $img_return = 'Product has been uploaded';
                    }
                } else {
                    $img_return = implode(', ', $errors); 
                }
            }
        } else {
            $img_return = 'пустой файл';
        }
        
        return $img_return;
    } catch (\Exception $e) {
        header('HTTP/1.1 409 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(['message' => $e->getMessage(), 'code' => 1337]));
    }
}

        $categories = Categories::find()->orderBy(['id' => SORT_DESC])->asArray()->limit(100)->all();
        return $this->render('addproduct',compact('categories'));
        }
        else{
            return $this->redirect('/');
        }
    }


    public function actionAddpost()
    {

        if(  Uservaludate::validateCookieModerator() ){
            $moderator = true;
        }
        else{
            $moderator = false;
        }


        if(  Uservaludate::validateUserAccount() ){
            $admin = true;
        }
        else{
            $admin = false;
        }
        if($admin){
        if (Yii::$app->request->isPost && $admin){

            


            $files      = $_FILES; 
            $done_files = array();
            if(!empty($files)){
            foreach( $files as $file ){
                 
    
                $errors = null;
                if(empty(trim($_POST['title'])) || empty(trim($_POST['text']))){
                    $errors = 'Заполните название и текст';
                }
                if($file['size'] == 0){
                    $errors = 'Загрузите файл';
                }
                $imageinfo = getimagesize($file['tmp_name']);
                $allowed_formats = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp', 'image/gif'];

                if (!in_array($imageinfo['mime'], $allowed_formats)) {
                    $errors[] = "Img has to be JPG, PNG, WEBP, or GIF";
                }

                 if(empty($errors)){
                    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $file_name = uniqid() . '.' . $ext; 
                    if(move_uploaded_file( $file['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/web/img/post/'.$file_name )){
                        

                        $cookies = Yii::$app->request->cookies;
                        if (($cookie = $cookies->get('login')) !== null) {
                            $email = $cookie->value;
                            $user_info = Login::find()->asArray()->where(['username' => $email])->one();
                        


                         $date_now = date('Y-m-d');
                Yii::$app->db->createCommand()->insert('posts', [
                                'user_id' => $user_info['id'],
                                'title' => $_POST['title'],
                                'text' => $_POST['text'],
                                'img_path' => 'web/img/post/'.$file_name,
                                'date' => $date_now,
                                'nickname' => $user_info['nickname'],
                                'avatar_path' => $user_info['img_path'],
                                'profile_description' => $user_info['description'],
                            ])->execute();
                }
                $img_return = 'Post has been uploaded';



                    }
                 }
                 else{
                    $img_return = $errors;
                 }
            }
            }
            else{
                $img_return = 'пустой файл';
            }

            return $img_return;
        }
        return $this->render('addpost');
        }
        else{
            return $this->redirect('/');
        }
}



public function actionAddevent()
    {

        if(  Uservaludate::validateCookieModerator() ){
            $moderator = true;
        }
        else{
            $moderator = false;
        }


        if(  Uservaludate::validateUserAccount() ){
            $admin = true;
        }
        else{
            $admin = false;
        }
        if($admin){
            $title = "Add event";
        if (Yii::$app->request->isPost && $admin){

            


            $files      = $_FILES; 
            $done_files = array();
            if(!empty($files)){
            foreach( $files as $file ){
                 
    
                $errors = null;
                if(empty(trim($_POST['title'])) || empty(trim($_POST['text']))){
                    $errors = 'Заполните название и текст';
                }
                if($file['size'] == 0){
                    $errors = 'Загрузите файл';
                }
                $imageinfo = getimagesize($file['tmp_name']);
                $allowed_formats = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp', 'image/gif'];

                if (!in_array($imageinfo['mime'], $allowed_formats)) {
                    $errors[] = "Img has to be JPG, PNG, WEBP, or GIF";
                }

                 if(empty($errors)){
                    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $file_name = uniqid() . '.' . $ext; 
                    if(move_uploaded_file( $file['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/web/img/post/'.$file_name )){
                        

                        $cookies = Yii::$app->request->cookies;
                        if (($cookie = $cookies->get('login')) !== null) {
                            $email = $cookie->value;
                            $user_info = Login::find()->asArray()->where(['username' => $email])->one();
                        


                         $date_now = date('Y-m-d');
                Yii::$app->db->createCommand()->insert('posts', [
                                'user_id' => $user_info['id'],
                                'title' => $_POST['title'],
                                'text' => $_POST['text'],
                                'img_path' => 'web/img/post/'.$file_name,
                                'date' => $date_now,
                                'nickname' => $user_info['nickname'],
                                'avatar_path' => $user_info['img_path'],
                                'profile_description' => $user_info['description'],
                                'type' => 'event',
                                'location' => $_POST['location'],
                                'event_date' => $_POST['datetime'],
                            ])->execute();
                }
                $img_return = 'Event has been uploaded';



                    }
                 }
                 else{
                    $img_return = $errors;
                 }
            }
            }
            else{
                $img_return = 'пустой файл';
            }

            return $img_return;
        }
        return $this->render('addevent');
        }
        else{
            return $this->redirect('/');
        }
}

public function actionAllposts()
    {
        if(  Uservaludate::validateUserAccount() ){
            $admin = true;
        }
        else{
            $admin = false;
        }
        $sql_limit = 10000;
            if (Yii::$app->request->isPost && $admin){
                $_POST = json_decode(file_get_contents('php://input'), true);
                if($_POST['target'] == 'get_posts'){
                    $posts = Posts::find()->orderBy(['id' => SORT_DESC])->asArray()->limit($sql_limit)->all();
                    $posts = json_encode($posts);
                    return $posts;
                }
            }
        if($admin){
            
            return $this->render('allposts');
        }
        else{
            return $this->redirect('/');
        }
    }

public function actionEvents()
    {
        if(  Uservaludate::validateUserAccount() ){
            $admin = true;
        }
        else{
            $admin = false;
        }
        if($admin){
            
            return $this->render('events');
        }
        else{
            return $this->redirect('/');
        }

    }

public function actionPostsingle()
    {
        if(  Uservaludate::validateUserAccount() ){
            $admin = true;
        }
        else{
            $admin = false;
        }
        if($admin){
            if (Yii::$app->request->isPost){
                if($_POST['target'] == 'select_posts'){
                    $posts_recent = Posts::find()->orderBy(['id' => SORT_DESC])->asArray()->limit(5)->all();
                    $posts_recent = json_encode($posts_recent);
                    return $posts_recent;
                }
            }
            return $this->render('postsingle');
        }
        else{
            return $this->redirect('/');
        }
    }


    public function actionChat()
    {
        if(  Uservaludate::validateUserAccount() ){
            $admin = true;
        }
        else{
            $admin = false;
        }
        if($admin){
            return $this->render('chat');
        }
        else{
            return $this->redirect('/');
        }
    }


    public function actionMarket()
    {
            $sql_limit = 10000;
        if (Yii::$app->request->isPost){
            $_POST = json_decode(file_get_contents('php://input'), true);
            if($_POST['target'] == 'get_market'){
                $market = Market::find()->orderBy(['id' => SORT_DESC])->asArray()->limit($sql_limit)->all();
                $market = json_encode($market);
                return $market;
            }
        }

        $categories = Categories::find()->orderBy(['name' => SORT_ASC])->asArray()->limit(100)->all();


            return $this->render('market',compact('categories'));
    }


    public function actionRouting()
    {
        if(  Uservaludate::validateUserAccount() ){
            $admin = true;
        }
        else{
            $admin = false;
        }
        if($admin){
            return $this->render('routing');
        }
        else{
            return $this->redirect('/');
        }
    }


    public function actionCalendar()
    {
        if(  Uservaludate::validateUserAccount() ){
            $admin = true;
        }
        else{
            $admin = false;
        }
        if($admin){
            return $this->render('calendar');
        }
        else{
            return $this->redirect('/');
        }
    }

    public function actionSettings()
    {
        if(  Uservaludate::validateUserAccount() ){
            $admin = true;
        }
        else{
            $admin = false;
        }
        if($admin){
            return $this->render('settings');
        }
        else{
            return $this->redirect('/');
        }
    }


    public function actionProfile()
    {
        if(  Uservaludate::validateUserAccount() ){
            $admin = true;
        }
        else{
            $admin = false;
        }
        if($admin){
            $sql_limit = 1000;
        if (Yii::$app->request->isPost){
            $_POST = json_decode(file_get_contents('php://input'), true);
            if($_POST['target'] == 'get_user_info'){
                $cookies = Yii::$app->request->cookies;
                if (($cookie = $cookies->get('login')) !== null) {
                    $email = $cookie->value;
                    $user_info = Login::find()->asArray()->where(['username' => $email])->one();
                    $user_info['auth_key'] = '*****';
                    $user_info['auth_key_hash'] = '*****';
                    $user_info['password'] = '*****';
                    if(empty($user_info['img_path'])){
                       $user_info['img_path'] = 'web/img/Proflie/profile-blank-icon-empty-photo-600nw-535853269.webp';
                    }
                    $user_info = json_encode($user_info);
                    return $user_info;
                }
                else{
                    $errors = 'user cookie is empty';
                    header('HTTP/1.1 409 Internal Server Booboo');
                    header('Content-Type: application/json; charset=UTF-8');
                    die(json_encode(array('message' => $errors, 'code' => 1337)));
                }

                
            }
            if($_POST['target'] == 'get_user_post'){
                $cookies = Yii::$app->request->cookies;
                if (($cookie = $cookies->get('login')) !== null) {
                    $email = $cookie->value;
                    $user_info = Login::find()->asArray()->where(['username' => $email])->one();
                    //$user_info['id'] = '5';
                    $user_posts = Posts::find()->orderBy(['id' => SORT_ASC])->asArray()->limit($sql_limit)->where(['user_id' => $user_info['id']])->all();
                    if(empty($user_posts)){
                        $user_posts['title'] = '';
                        $user_posts['text'] = '';
                        $user_posts['img_path'] = '';
                        $user_posts['date'] = '';
                    }
                    $user_posts = json_encode($user_posts);
                    return $user_posts;
                }
                else{
                    $errors = 'user cookie is empty';
                    header('HTTP/1.1 409 Internal Server Booboo');
                    header('Content-Type: application/json; charset=UTF-8');
                    die(json_encode(array('message' => $errors, 'code' => 1337)));
                }

                
            }
            if($_POST['target'] == 'get_user_market'){
                $cookies = Yii::$app->request->cookies;
                if (($cookie = $cookies->get('login')) !== null) {
                    $email = $cookie->value;
                    $user_info = Login::find()->asArray()->where(['username' => $email])->one();
                    //$user_info['id'] = '5';
                    $user_posts = Market::find()->orderBy(['id' => SORT_ASC])->asArray()->limit($sql_limit)->where(['user_id' => $user_info['id']])->all();
                    if(empty($user_posts)){
                        $user_posts['title'] = '';
                        $user_posts['text'] = '';
                        $user_posts['img_path'] = '';
                        $user_posts['date'] = '';
                    }
                    $user_posts = json_encode($user_posts);
                    return $user_posts;
                }
                else{
                    $errors = 'user cookie is empty';
                    header('HTTP/1.1 409 Internal Server Booboo');
                    header('Content-Type: application/json; charset=UTF-8');
                    die(json_encode(array('message' => $errors, 'code' => 1337)));
                }

                
            }
            if($_POST['target'] == 'get_post_info'){
                $user_posts = Posts::find()->asArray()->where(['id' => $_POST['id']])->one();
                $user_info_pic = Login::find()->asArray()->where(['id' => $user_posts['user_id']])->one();
                $user_posts['avatar_path'] = $user_info_pic['img_path'];
                if(empty($user_posts['avatar_path'])){
                       $user_posts['avatar_path'] = 'web/img/Proflie/profile-blank-icon-empty-photo-600nw-535853269.webp';
                    }
                $user_posts = json_encode($user_posts);
                    return $user_posts;
            }
            if($_POST['target'] == 'delete_post'){
                $errors = false;
                $type = Uservaludate::validateInput($_POST['type']);
                $id = Uservaludate::validateInput($_POST['id']);
                if($type != 'market' && $type != 'post'){
                    $errors = 'incorrect type';
                }
                if(!$errors){
                    $return_val = Uservaludate::delete_post($type, $id);
                    return $return_val;
                }
                else{
                    header('HTTP/1.1 409 Internal Server Booboo');
                    header('Content-Type: application/json; charset=UTF-8');
                    die(json_encode(array('message' => $errors, 'code' => 1337)));
                }
            }
        }



            return $this->render('profile');
        }
        else{
            return $this->redirect('/');
        }
    }

    public function actionGallery()
    {
        if(  Uservaludate::validateUserAccount() ){
            $admin = true;
        }
        else{
            $admin = false;
        }
        if($admin){
            return $this->render('gallery');
        }
        else{
            return $this->redirect('/');
        }
    }

public function actionAddphoto()
    {

        if(  Uservaludate::validateCookieModerator() ){
            $moderator = true;
        }
        else{
            $moderator = false;
        }


        if(  Uservaludate::validateUserAccount() ){
            $admin = true;
        }
        else{
            $admin = false;
        }
        if($admin){
        if (Yii::$app->request->isPost && $admin){

            
            //$_POST['title']
            //$_POST['text']

            $files      = $_FILES; 
            $done_files = array();
            if(!empty($files)){
            foreach( $files as $file ){
                 
    
                $errors = null;
                if($file['size'] == 0){
                    $errors = 'Загрузите файл';
                }
                $imageinfo = getimagesize($file['tmp_name']);
        
                         if($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg' && $imageinfo['mime'] != 'image/webp') {
                  $errors = "This image format is not supported";
                 }

                 if(empty($errors)){
                    $file_name = uniqid();
                    $file_name = $file_name.".jpeg";

                    if(empty($_POST['title']) && empty($_POST['text'])){ //Если просто картника без описания и названия
                        if(move_uploaded_file( $file['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/web/img/Proflie/'.$file_name )){
                        
                        $cookies = Yii::$app->request->cookies;
                        if (($cookie = $cookies->get('login')) !== null) {
                            $email = $cookie->value;
                            $user_info = Login::find()->asArray()->where(['username' => $email])->one();
                            if(!empty($user_info['img_path'])){
                                unlink($_SERVER['DOCUMENT_ROOT'].'/'.$user_info['img_path']);
                            }
                            $img_return = 'Avatar has been updated';
                            
                            $update = Login::findone($user_info['id']);
                            $update->img_path = 'web/img/Proflie/'.$file_name;
                            $update->save(); 
                        }
                        }
                    }
                    else{



                    if(move_uploaded_file( $file['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/web/img/post/'.$file_name )){
                        $img_return = 'Файл успешно загружен '.$_POST['title'].' '.$_POST['text'];
                    }
                    }
                 }
                 else{
                    $img_return = $errors;
                 }
            }
            }
            else{
                $img_return = 'пустой файл';
            }

            return $img_return;
        }
        return $this->render('addphoto');
        }
        else{
            return $this->redirect('/');
        }
}

    
    

    
    
    public function actionLogexit(){

        
                        $cookies = Yii::$app->response->cookies;
                    
                        unset($cookies['admin']);
                        unset($cookies['moderator']);
                        unset($cookies['auth_key']);
                        return $this->redirect('/');
    }

    

    public function actionSendmail(){
        //$send_email = Uservaludate::SendMail('ip557799@gmail.com', 'tema5', 'Пользователь запросил чат с оператором', 'Chat: Дата запроса: '.date("Y-m-d H:i:s"));
        return $this->render('sendmail');
    }
    public function actionSendmailfile(){
        return $this->render('sendmailfile');
    }
    
    
    
    public function actionLogin(){

        if(  Uservaludate::validateUserAccount() ){
            $admin = true;
        }
        else{
            $admin = false;
        }
        
        $login_model = new Login();
        
        $errors;
        
        
        if (Yii::$app->request->isPost){
            $_POST = json_decode(file_get_contents('php://input'), true);
            //$2y$10$QxhrMS0wQp32xwLjObr54uZKCKMIWy.Kr6iUQEOgwcLXFQBm/4Fv2

            if($_POST['target'] == 'changepass'){
                $password_new = Uservaludate::validateInput($_POST['password_new']);
                $pass = Uservaludate::validateInput($_POST['password']);
                $cookies = Yii::$app->request->cookies;
                $email = $cookies->get('login');
                $pr_username = Login::find()->asArray()->where(['username' => $email])->one();

                if(!password_verify($pass, $pr_username['password'])){
                    //return "Некорретный пароль от аккаунта";
                    header('HTTP/1.1 409 Internal Server Booboo');
                    header('Content-Type: application/json; charset=UTF-8');
                    die(json_encode(array('message' => 'Некорретный пароль от аккаунта', 'code' => 1337)));
                }
                else{
                    if(strlen($password_new) > 7 && strlen($password_new) < 200){
                        $password_new_generate = password_hash($password_new, PASSWORD_DEFAULT);
                        $update = Login::findone($pr_username['id']);
                        $update->password = $password_new_generate;
                        $update->save(); 
                        return "Password has been updated";
                    }
                    else{
                        header('HTTP/1.1 409 Internal Server Booboo');
                        header('Content-Type: application/json; charset=UTF-8');
                        die(json_encode(array('message' => 'Пароль должен быть не менее 8 символов', 'code' => 1337)));
                    }
                    
                }

                

                
            }

            if($_POST['target'] == 'signin'){

            

            $email = Uservaludate::validateInput($_POST['email']);
            
            $pass = Uservaludate::validateInput($_POST['password']);

            
            $pr_username = Login::find()->asArray()->where(['username' => $email])->one();
            
            if(empty($pr_username)){
                $errors = "Пользователь ".$email ." не найден";
            }
            else if($pr_username['isblocked'] == 1){
                $errors = "Данная учетная запись заблокирована";
            }
            else{
                if($pr_username['errors'] >= 5){
                    //$errors = "Повторный пароль выслан на почту";
                    $errors = "Новый пароль выслан Вам на почту, если нет письма, то просьба проверить СПАМ";
                    
                    if(empty($pr_username['code_email'])){
                       $kod_sesi = Uservaludate::generate_code(8);
                     $to  = "<".$email.">" ;

                        $subject = "Ваш новый пароль"; 

                        $message = '
                            <html>
                            <head>
                              <title>Новый пароль:</title>
                            </head>
                            <body>
                              <p>Пароль: '.$kod_sesi.';</p> 
                            </body>
                            </html>
                            ';

                        $headers = 'From: Week@example.com' . "\r\n" .
                        'Content-type: text/html; charset=UTF-8' . "\r\n" .
                        'Reply-To: Week@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                        mail($to, $subject, $message, $headers);
                    
                        $kod_sesi = password_hash($kod_sesi, PASSWORD_DEFAULT);
                    
                        $update = Login::findone($pr_username['id']);
                        $update->password = $kod_sesi;
                        $update->code_email = $kod_sesi;
                        $update->errors = 0;
                        $update->save(); 
                    }
                    else{
                        $errors = "Ваша учетная запись заблокирована, пожлауйста, обратитись к администратору";
                    }
                    
                    
                    
                }
                else{
                  if(!password_verify($pass, $pr_username['password'])){
                        $count_try = 4 - $pr_username['errors'];
                      $up_err = $pr_username['errors'] + 1;
                      $errors = 'The password is incorrect, remaining number of login attemps: '.$count_try;
                      $update = Login::findone($pr_username['id']);
                      $update->errors = $up_err;
                      $update->save();
                      
                }  
                }
                
            }


            if(empty($errors)){
                
            
            
            
                if( empty($errors) ){  //save()

                        $name = 'login';


                        // Костыль
                        if($pr_username['username'] == 'julia.anderson@mail.com' || $pr_username['username'] == '12021970e@gmail.com'){
                                $name = 'moderator';
                        }



                      

                        $cookies = Yii::$app->response->cookies;
                    
                        $cookies->add( new \yii\web\Cookie([
                            'name' => $name,
                            'value' => $pr_username['username'],
                            'expire' => time() + 86400 * 365,
                        ]));
                         /* $cookies->add( new \yii\web\Cookie([
                            'name' => 'auth_key',
                            'value' => $pr_username['auth_key'],
                            'expire' => time() + 86400 * 365,
                        ]));*/
                        $cookies->add( new \yii\web\Cookie([
                            'name' => 'auth_key',
                            'value' => $pr_username['auth_key_hash'],
                            'expire' => time() + 86400 * 365,
                        ]));
                    
                        $update = Login::findone($pr_username['id']);
                        $update->errors = 0;
                        $update->code_email = '';
                        $update->save();
                        //return $this->redirect('/');
                        return 'Данные приняты';
                    }
                    else
                    {
                        
                        
                        return $errors;
                    }
            }
            elseif($errors == "Повторный пароль выслан на почту" && !empty($pr_username['code_email'])){
               $pr_username = Login::find()->asArray()->where(['username' => $email])->one();
                if(password_verify($pass, $pr_username['code_email'])){
                   
                        $cookies = Yii::$app->response->cookies;


                        $name = 'admin';

                        if($pr_username['username'] == 'julia.anderson@mail.com' || $pr_username['username'] == '12021970e@gmail.com'){
                                $name = 'moderator';
                        }
                    
                        $cookies->add( new \yii\web\Cookie([
                            'name' => $name,
                            'value' => $pr_username['username'],
                            'expire' => time() + 86400 * 365,
                        ]));
                         $cookies->add( new \yii\web\Cookie([
                            'name' => 'auth_key',
                            'value' => $pr_username['auth_key'],
                            'expire' => time() + 86400 * 365,
                        ]));
                    
                        $update = Login::findone($pr_username['id']);
                        $update->errors = 0;
                        $update->code_email = '';
                        $update->save();
                        //return $this->redirect('/');
                        return 'Данные приняты';
                }
                else{
                    return 'Код не совпадает с высланным на почту';
                }
            }
            else{
                 //return $errors;
                header('HTTP/1.1 409 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => $errors, 'code' => 1337)));
            }
            }

        }
        
        
        if($login_model->load(Yii::$app->request->post())){
            
            
            $email = Uservaludate::validateInput($login_model->username);
            
            $pass = Uservaludate::validateInput($login_model->password);
            
            $pr_username = Login::find()->asArray()->where(['username' => $email])->one();
            
            if(empty($pr_username)){
                $errors = "Пользователь ".$email ." не найден";
            }
            else{
                if($pr_username['errors'] >= 5){
                    $errors = "Повторный пароль выслан на почту";
                    
                    if(empty($pr_username['code_email'])){
                       $kod_sesi = Uservaludate::generate_code(5);
                     $to  = "<".$email.">" ;

                        $subject = "Код подтверждения"; 

                        $message = '
                            <html>
                            <head>
                              <title>Ваш код:</title>
                            </head>
                            <body>
                              <p>Код: '.$kod_sesi.';</p> 
                            </body>
                            </html>
                            ';

                        $headers = 'From: PawLeashClub@example.com' . "\r\n" .
                        'Content-type: text/html; charset=UTF-8' . "\r\n" .
                        'Reply-To: PawLeashClub@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                        mail($to, $subject, $message, $headers);
                    
                        $kod_sesi = password_hash($kod_sesi, PASSWORD_DEFAULT);
                    
                        $update = Login::findone($pr_username['id']);
                        $update->code_email = $kod_sesi;
                        $update->save(); 
                    }
                    
                    
                    
                }
                else{
                  if(!password_verify($pass, $pr_username['password'])){
                      $up_err = $pr_username['errors'] + 1;
                      $errors = 'Неправильный пароль';
                      $update = Login::findone($pr_username['id']);
                      $update->errors = $up_err;
                      $update->save();
                      
                }  
                }
                
            }
            
            
            if(empty($errors)){
                
            
            
            
                if( $login_model->validate() ){  //save()

                        $name = 'admin';


                        // Костыль
                        if($pr_username['username'] == 'julia.anderson@mail.com' || $pr_username['username'] == '12021970e@gmail.com'){
                                $name = 'moderator';
                        }



                        Yii::$app->session->setFlash('success', 'Данные приняты');

                        $cookies = Yii::$app->response->cookies;
                    
                        $cookies->add( new \yii\web\Cookie([
                            'name' => $name,
                            'value' => $pr_username['username'],
                            'expire' => time() + 86400 * 365,
                        ]));
                         $cookies->add( new \yii\web\Cookie([
                            'name' => 'auth_key',
                            'value' => $pr_username['auth_key'],
                            'expire' => time() + 86400 * 365,
                        ]));
                    
                        $update = Login::findone($pr_username['id']);
                        $update->errors = 0;
                        $update->code_email = '';
                        $update->save();
                        return $this->redirect('/');
                    }
                    else
                    {
                        
                        foreach ($login_model->getErrors() as $key => $value) {
                        $error_arr =  $key.': '.$value[0];
                      }
                        Yii::$app->session->setFlash('error', $error_arr);
                    }
            }
            elseif($errors == "Повторный пароль выслан на почту" && !empty($pr_username['code_email'])){
               $pr_username = Login::find()->asArray()->where(['username' => $email])->one();
                if(password_verify($pass, $pr_username['code_email'])){
                    Yii::$app->session->setFlash('success', 'Данные приняты');
                        $cookies = Yii::$app->response->cookies;


                        $name = 'admin';

                        if($pr_username['username'] == 'julia.anderson@mail.com' || $pr_username['username'] == '12021970e@gmail.com'){
                                $name = 'moderator';
                        }
                    
                        $cookies->add( new \yii\web\Cookie([
                            'name' => $name,
                            'value' => $pr_username['username'],
                            'expire' => time() + 86400 * 365,
                        ]));
                         $cookies->add( new \yii\web\Cookie([
                            'name' => 'auth_key',
                            'value' => $pr_username['auth_key'],
                            'expire' => time() + 86400 * 365,
                        ]));
                    
                        $update = Login::findone($pr_username['id']);
                        $update->errors = 0;
                        $update->code_email = '';
                        $update->save();
                        return $this->redirect('/');
                }
                else{
                    Yii::$app->session->setFlash('error', "Код не совпадает с высланным на почту");
                }
            }
            else{
                 Yii::$app->session->setFlash('error', $errors);
            }
            
            
            
        }

        if(!$admin){
            return $this->render('login', compact('login_model'));
        }
        else{
            return $this->redirect('/');
        }
        
        
    }
    
    
    
    
}