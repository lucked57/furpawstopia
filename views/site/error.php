<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

//$this->title = $name;
?>
<!--<div class="container mt-5 pt-5">
    <div class="site-error">

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>

        <p>
            The above error occurred while the Web server was processing your request.
        </p>
        <p>
            Please contact us if you think this is a server error. Thank you.
        </p>

    </div>
</div>
</main>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <meta name="description" content="Free Web tutorials">
</head>
<body>
    <a class="ac" href="javascript:void(0)"  
onclick="window.history.pushState('data', 'Title', '/Main'); changeurl();">
Main
</a>
<a class="ac" href="javascript:void(0)"  
onclick="window.history.pushState('data', 'Title', '/Contact');changeurl();">
Contact
</a>
<a class="ac" href="javascript:void(0)"  
onclick="window.history.pushState('data', 'Title', '/About');changeurl();">
About
</a>
   

    <script type="text/javascript">

        function changeurl(){
            let hrefthis = window.location.href;
                if(hrefthis.indexOf('Contact') > -1){
                    document.title = 'Contact';
                    let metaTag = document.querySelector('meta[name="description"]');
                        if (metaTag) {
                          metaTag.setAttribute("content", "contacts description");
                        }
                }
                if(hrefthis.indexOf('About') > -1){
                    document.title = 'about';
                    let metaTag = document.querySelector('meta[name="description"]');
                        if (metaTag) {
                          metaTag.setAttribute("content", "about description");
                        }
                }
                if(hrefthis.indexOf('Main') > -1){
                    document.title = 'Main';
                    let metaTag = document.querySelector('meta[name="description"]');
                        if (metaTag) {
                          metaTag.setAttribute("content", "main description");
                        }
                }
        }

        changeurl();
        
            
       
    </script>

</body>
</html>


