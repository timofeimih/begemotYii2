<?php
namespace backend\modules\pictureBox\assets;

use yii\web\AssetBundle;
 
class PictureBoxAssets extends AssetBundle
{
    public $sourcePath = '@backend/modules/pictureBox/assets'; //алиас каталога с файлами, который соответствует @web
    public $css = [
        'css/pictureBox.css',
        'js/jquery.imgareaselect/css/imgareaselect-default.css',
        'css/uploadify.css'
    ];
    public $js = [
    	'js/jquery-1.3.1.min.js',
    	'js/jquery.imgareaselect/scripts/jquery.imgareaselect.pack.js',
    	'js/jquery.uploadify-3.1.min.js'
    ];
}