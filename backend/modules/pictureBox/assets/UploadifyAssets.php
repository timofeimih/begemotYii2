<?php
namespace backend\modules\pictureBox\assets;

use yii\web\AssetBundle;
 
class UploadifyAssets extends AssetBundle
{
    public $sourcePath = '@backend/modules/pictureBox/assets'; //алиас каталога с файлами, который соответствует @web
    public $css = [
        'css/uploadify.css'
    ];
    public $js = [
    	'js/jquery-1.3.1.min.js',
    	'js/jquery.uploadify-3.1.min.js'
    ];

    public $jsOptions = [
    	'position' => 0
    ];
}