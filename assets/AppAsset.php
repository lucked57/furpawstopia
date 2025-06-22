<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap5.min.css',
        //'css/animate.css',
        'css/style_original.css?v1.018',
        'css/style.css?v1.001',
        'css/responsive.css?v1.0181',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css',
        //'css/style.sass',
        //'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css',
        'https://fonts.googleapis.com',
        'https://fonts.gstatic.com',
        'https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap',
        //'fonts/icomoon/style.css',
        //'fonts/flaticon/font/flaticon.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css',
        'css/tiny-slider.css',
        'css/aos.css',
        'css/glightbox.min.css',
        'css/flatpickr.min.css',
        'https://cdn.jsdelivr.net/npm/photoswipe@5.3.7/dist/photoswipe.css',
        

    ];
    public $js = [
        'web/axios/dist/axios.min.js',
        //'js/bootstrap5.bundle.min.js',
        'js/bootstrap.bundle.min.js',
        'web/chars/loader.js',
        'js/vue.global.prod.min.js',
        'https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js',
        'js/main_vue3.js?v1.05551',
        //'https://cdnjs.cloudflare.com/ajax/libs/fetch/3.6.2/fetch.min.js'
        //'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js',
        'js/tiny-slider.js',
        'js/flatpickr.min.js',
        'js/aos.js',
        'js/glightbox.min.js',
        'js/navbar.js',
        'js/counter.js',
        'js/custom.js',
        
    ];
    
    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];
    public $depends = [
        //'yii\web\YiiAsset', //remove it later
        //'yii\bootstrap\BootstrapAsset',
    ];
}
