<?php

    namespace app\models;

    use yii\db\ActiveRecord;

    class Market extends ActiveRecord{

        public static function tableName(){
        return 'market';
    }
        
    }