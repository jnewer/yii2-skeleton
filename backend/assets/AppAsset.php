<?php

namespace backend\assets;

use yii\web\View;
use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = ['position'=>View::POS_HEAD];
    public $css = [
        'css/site.css',
        'js/daterangepicker/daterangepicker.css',
        'js/datepicker/datepicker3.css',
        'css/jasny-bootstrap.min.css',
        'css/webuploader.css',
        'css/zoomify.min.css',
        // 'css/upload.css',
    ];
    public $js = [
        'js/daterangepicker/daterangepicker.js',
        'js/datepicker/bootstrap-datepicker.js',
        'js/datepicker/locales/bootstrap-datepicker.zh-CN.js',
        'js/slimScroll/jquery.slimscroll.min.js',
        'js/jasny-bootstrap.min.js',
        'js/webuploader.min.js',
        'js/zoomify.min.js',
        // 'js/upload.js',
        'layer/layer.js',
        'js/app.js',
        'js/viewer.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\widgets\ActiveFormAsset',
        'backend\assets\BlueimpGalleryAsset',
        'kartik\select2\Select2Asset',
        'kartik\select2\ThemeDefaultAsset',
        'backend\assets\AdminLteAsset',
        // 'backend\assets\CKFinderAsset',
        // 'backend\assets\Select2BootstrapThemeAsset',
    ];
}
