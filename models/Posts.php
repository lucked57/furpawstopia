<?php

    namespace app\models;

    use yii\db\ActiveRecord;

    class Posts extends ActiveRecord{

        
        public static function tableName(){
        return 'posts';
    }
        
        

        
    }