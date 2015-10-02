<?php
namespace backend\assets;

use yii\web\AssetBundle;
 
class UploadifyAssets extends AssetBundle
{
    public $sourcePath = '@backend/widgets/assets'; //алиас каталога с файлами, который соответствует @web
    public $css = [
        'uploadify.css',
    ];
    public $js = [
    	'jquery.uploadify-3.1.min.js'
    ];
}