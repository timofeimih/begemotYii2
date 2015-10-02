<?php

use backend\assets\UploadifyAssets;
UploadifyAssets::register($this);

$uploadifyJsScript = '
      $(function() {
        $(\'#file_upload\').uploadify({
            \'swf\'      : \'/uploadify.swf\',
            \'uploader\' : \''.$uploader.'\',
            // Your options here
            "buttonText":"Загрузить файлы",
            "formData":'.$formDataJson.',
            "onQueueComplete":function(queueData){location.reload();;}
        });
    }); 
';
$this->registerJs($uploadifyJsScript,5,'uploadify');


?>



<input type="file" name="file_data" id="file_upload" />
