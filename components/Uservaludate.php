<?php

namespace app\components;

use Yii;
use app\models\Login;
use app\models\Market;
use app\models\Breed;
use app\models\Type;
use app\models\Posts;

class Uservaludate{
    
      public static function validateInput($arr){
        
        $arr = str_replace("'", "", $arr);
        
        $arr = str_replace("<", "", $arr);

        $arr = str_replace(">", "", $arr);
        
        return $arr;
    }

    public static function delete_post($type, $id){

        try {

            if($type == 'market'){
                $post = Market::find()->asArray()->where(['id' => $id])->one();
                if(empty($post)){
                    return 'post not found';
                }
                else{
                    if (file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$post['path'])){
                        Yii::$app->db->createCommand()->delete('market', 'id = '.$id)->execute();
                        unlink($_SERVER['DOCUMENT_ROOT'].'/'.$post['path']);
                        return 'post has been deleted';
                    }
                    else{
                        return 'file not exist';
                    }
                }
            }
            else if($type == 'post'){
                $post = Posts::find()->asArray()->where(['id' => $id])->one();
                if(empty($post)){
                    return 'post not found';
                }
                else{
                    if (file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$post['img_path'])){
                        Yii::$app->db->createCommand()->delete('posts', 'id = '.$id)->execute();
                        unlink($_SERVER['DOCUMENT_ROOT'].'/'.$post['img_path']);
                        return 'post has been deleted';
                    }
                    else{
                        return 'file not exist';
                    }
                }
            }
            else{
                return 'incorrect type';
            }

        } catch (\Exception $e) {
              //header('HTTP/1.1 409 Internal Server Booboo');
             // header('Content-Type: application/json; charset=UTF-8');
              //die(json_encode(array('message' => $e->getMessage(), 'code' => 1337)));
            return $e->getMessage();
        }

    }
    
    public static function validateCookie(){

        $cookies = Yii::$app->request->cookies;



        if (($cookie = $cookies->get('admin')) !== null) {
            $email = $cookie->value;
            $pr_admin = Login::find()->asArray()->where(['username' => $email])->one();//disable database
        }
        if (($cookie = $cookies->get('auth_key')) !== null) {
            $auth_key = $cookie->value;
        }




        if(!empty($pr_admin)){
            if(strcasecmp($pr_admin['auth_key'], $auth_key) == 0){
            return true;
        }
            else{
                return false;
            }
        }
    }






    public static function validateCookieModerator(){

        $cookies = Yii::$app->request->cookies;



        if (($cookie = $cookies->get('moderator')) !== null) {
            $email = $cookie->value;
            $pr_admin = Login::find()->asArray()->where(['username' => $email])->one();
        }
        if (($cookie = $cookies->get('auth_key')) !== null) {
            $auth_key = $cookie->value;
        }




        if(!empty($pr_admin)){
            if(strcasecmp($pr_admin['auth_key'], $auth_key) == 0){
            return true;
        }
            else{
                return false;
            }
        }
    }
    
    
    public static function CookieLang(){
        
            $cookies = Yii::$app->request->cookies;

            if (($cookie = $cookies->get('lang')) == null) {
               $lang = 'ru';
            }
            else{
                $lang = $cookie->value;
            }
                return $lang;
    }
    
        public static function generate_code($len)
        {
            $string = '';

            $chars = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM9876543210';

            $num_chars = strlen($chars);

            for ($i = 0; $i < $len; $i++)
            {
                $string .= substr($chars, rand(1,$num_chars)-1, 1);
            }
            return $string;

        }
        public static function routing_lang(){
            $url      = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $validURL = str_replace("&", "&amp", $url);

            $pos      = strripos($validURL, '/ee');

            if ($pos === false) {
                $lang = 'ru';
            } else {
                $lang = 'ee';
            }
             $cookies = Yii::$app->response->cookies;
                        $cookies->add( new \yii\web\Cookie([
                                'name' => 'lang',
                                'value' => $lang,
                                'expire' => time() + 86400 * 365,
                            ]));
            Yii::$app->params['lang'] = $lang;
            return $lang;
        }

        public static function validateUserAccount(){

        $cookies = Yii::$app->request->cookies;



        if (($cookie = $cookies->get('login')) !== null) {
            $email = $cookie->value;
            $pr_user_acc = Login::find()->asArray()->where(['username' => $email])->one();
        }
        if (($cookie = $cookies->get('auth_key')) !== null) {
            $auth_key = $cookie->value;
        }




        if(!empty($pr_user_acc) && $pr_user_acc['isblocked'] != 1 && !empty($auth_key)){
            if(password_verify($pr_user_acc['auth_key'], $auth_key)){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

        public static function createNewAccount($username, $breed, $description, $color, $img_path, $type,$password_without_hash, $name, $nickname){

            $errors = false;

            $pr_breed = Breed::find()->asArray()->where(['name' => $breed])->one();
            $pr_type = Type::find()->asArray()->where(['type' => $type])->one();

            $pr_user_acc = Login::find()->asArray()->where(['username' => $username])->one();

            if(empty($pr_breed) || empty($pr_type)){
                $errors = 'breed or type not found';
            }

            /*if(empty($pr_user_acc['username'])){
                $errors = 'username has already exist';
            }*/

            //$errors = $pr_user_acc['username'];

            

            if(!$errors){
                $model = new Uservaludate; 
                //$password_without_hash = $model->generate_code(8);
                $password = password_hash($password_without_hash, PASSWORD_DEFAULT);
                $auth_key = $model->generate_code(20);
                $auth_key_hash = password_hash($auth_key, PASSWORD_DEFAULT);

                $model->SendMail($username, 'New account has been created', 'New account has been created on the website Pettopia', 'New account has been created on the website Pettopia, your password is '.$password_without_hash);
                //$date = new DateTime();
                //$date_now = $date->format("Y-m-d");
                $date_now = date('Y-m-d');

                Yii::$app->db->createCommand()->insert('user', [
                                'username' => $username,
                                'password' => $password,
                                'auth_key' => $auth_key,
                                'errors' => 0,
                                'breed' => $breed,
                                'auth_key' => $auth_key,
                                'auth_key_hash' => $auth_key_hash,
                                'img_path' => $img_path,
                                'description' => $description,
                                'color' => $color,
                                'date_created' => $date_now,
                                'type' => $type,
                                'name' => $name,
                                'nickname' => $nickname,
                            ])->execute();
                return false;
            }
            else{
                return $errors;
            }

            
        }


        public static function SendMail($email, $subject_text, $title, $text){
                        $to  = "<".$email.">" ;

                        $subject = $subject_text; 

                        $message = '
                            <html>
                            <head>
                              <title>'.$title.'</title>
                            </head>
                            <body>
                              <p>'.$text.'</p> 
                            </body>
                            </html>
                            ';

                        $headers = 'From: Week@example.com' . "\r\n" .
                        'Content-type: text/html; charset=UTF-8' . "\r\n" .
                        'Reply-To: Week@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                       if(mail($to, $subject, $message, $headers)){
                        return true;
                       }
                       else{
                        return false;
                       }
    }
    
}