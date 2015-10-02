<?php 
use \yii\bootstrap\Modal;
use \yii\bootstrap\Button;

use backend\modules\pictureBox\assets\PictureBoxAssets;
PictureBoxAssets::register($this);
 ?>
<?php Modal::begin([
    'id' => 'myModal',
    'headerOptions'=>array(
        'style'=>"width:1000px;left:auto;"
    ),
    'options'=>array(
        'beforeClose'=>' console.log("123")',
        'title'=>'',
        'resizable'=>'true',
        'closeOnEscape'=>'true'
    ),
]); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Modal header</h4>
</div>

<div class="modal-body">
    <img id="ladybug_ant" style="float:left;" src=""/>
</div>

<div class="modal-footer">
    <?php Button::widget([
        'label' => 'Save changes',
        'options' => array('class' => 'btn-primary', 'data-dismiss' => 'modal','onClick'=>'sendResizeRequest();',),
    ]); ?>
    <?php Button::widget([
        'label' => 'Close',
        'options' => array('data-dismiss' => 'modal'),
    ]); ?>
</div>

<?php Modal::end(); ?>

<?php


$script = "

var resizeData = {
    sourceImg:null,
    width:1,
    height:2,
    originalWidth:0,
    originalHeight:0,
    originalSize:false,
    selection:null,
    catId:null,
    filterName:null,
    activeImage:null
};

function setResizeImage(src,width,height,data){

    //alert(data.activeImage);
    resizeData.sourceImg =  src;

    href = src;

    img = new Image();

	img.onload=function (){
        resizeData.originalWidth = img.width;
        resizeData.originalHeight = img.height;

        if (img.width > 500){
            resizeData.originalSize = false;
            $('#ladybug_ant').css('width','500px');
        } else{
            resizeData.originalSize = true;
            $('#ladybug_ant').css('width','auto');
        }
        console.log( resizeData.originalSize);
	}


    img.src = href;



    resizeData.width = width;
    resizeData.height = height;


   $('#ladybug_ant').attr('src',resizeData.sourceImg);
   $('#scaleImg').attr('src',resizeData.sourceImg);
   $('#scaleDiv').css({
           width: width + 'px',
        height: height + 'px',
   });


$('#ladybug_ant').imgAreaSelect({
    aspectRatio: width+':'+height,
    handles: true,
    onSelectChange: preview,
    onSelectEnd: selectParamSave  });

}
var selectParamSave = function(img, selection){

    resizeData.selection = selection;

}

function sendResizeRequest(){


    if (resizeData.originalSize !=true ){
            var scaleX = 500/resizeData.originalWidth;
            var scaleY = resizeData.height  / (resizeData.selection.height*(resizeData.originalWidth/500) || 1);
           // alert('scale Y:'+scaleX+'scale X:'+scaleY);
            resizeData.selection.x1 = Math.round(resizeData.selection.x1/scaleX);
            resizeData.selection.y1 = Math.round(resizeData.selection.y1/scaleX);


            resizeData.selection.width = Math.round(resizeData.selection.width/scaleX);
            resizeData.selection.height = Math.round(resizeData.selection.height/scaleX);

    }
    //alert(resizeData.selection.x1+' '+resizeData.selection.y1+' '+resizeData.selection.width+' '+resizeData.selection.height+' ');
    $.ajax(
        {
            url: '/pictureBox/default/ajaxMakeFilteredImage/id/'+PB_".$config['divId'].".id +'/elementId/'+resizeData.catId+'/pictureId/'+resizeData.activeImage+'/filterName/'+resizeData.filterName+'/x/'+resizeData.selection.x1+'/y/'+resizeData.selection.y1+'/width/'+resizeData.selection.width+'/height/'+resizeData.selection.height,
            success: alert('Размер изображения изменен!')
        });
}

var preview = function (img, selection) {
    if (resizeData.originalSize ==true ){
        var scaleX = resizeData.width  / (selection.width || 1);
        var scaleY = resizeData.height  / (selection.height || 1);

        $('#scaleImg').css({
            width: Math.round(scaleX *  resizeData.originalWidth) + 'px',
            height: Math.round(scaleY *  resizeData.originalHeight) + 'px',
            marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
            marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
        });
    } else{
        var scaleX = resizeData.width  / (selection.width*(resizeData.originalWidth/500) || 1);
        var scaleY = resizeData.height  / (selection.height*(resizeData.originalWidth/500) || 1);

        $('#scaleImg').css({
            width: Math.round(scaleX *  resizeData.originalWidth) + 'px',
            height: Math.round(scaleY *  resizeData.originalHeight) + 'px',
            marginLeft: '-' + Math.round(scaleX*(resizeData.originalWidth/500) * selection.x1) + 'px',
            marginTop: '-' + Math.round(scaleY*(resizeData.originalWidth/500) * selection.y1) + 'px'
        });
    }
}

$('<div id=\"scaleDiv\"><img id=\"scaleImg\" src=\"/files/pictureBox/catalogItem/477/0.jpg?tmp=100\" style=\"position: relative;float:left;max-width:none;\" /><div>')
        .css({
            float: 'left',
            position: 'relative',
            overflow: 'hidden',
            width: '100px',
            height: '100px',
            border:'1px'

        })
        .insertAfter($('#ladybug_ant'));

$('#myModal').on('hide', function() {
    $('.imgareaselect-selection').parent().css('height','0px');
    $('.imgareaselect-selection').css('height','0px');
    $('.imgareaselect-border1').css('height','0px');
    $('.imgareaselect-border2').css('height','0px');
    $('.imgareaselect-border3').css('height','0px');
    $('.imgareaselect-border4').css('height','0px');

    $('.imgareaselect-outer').css('height','0px');
  });


";
$this->registerJs($script, 5, 'image-resize');






$thisPictureBoxScript = '
                
                function loadPage(page,state,divId){
                    
                    state.imageNumber=page;
   
                    refreshPictureBox(divId,state)
                }
                
                function setTitleAlt(state,divId){
                     var title = $("#"+divId+" input[name=title]").val();
                     var alt = $("#"+divId+" input[name=alt]").val();
                     var data = {};
                     data.title = title;
                     data.alt = alt;
                     data.id = state.id;
                     data.elementId = state.elementId;
                     data.pictureId = state.pictureBoxPage;

                    $.ajax({
                        url:"/pictureBox/default/ajaxSetTitle",
                        data:data,
                        cache:false,
                        async:true,
                        type:"post",
                        success:function(html){
             
                             alert("Сохранено. ");
                             refreshPictureBox(divId,state);
                             
                        }
                    });
                 
                   
                }

                function refreshPictureBox(divId,state){


                    $.ajax({
                        url:"/pictureBox/default/ajax-layout",
                        data:state,
                        cache:false,
                        async:false,
                        success:function(html){

                            $("#"+divId).html(html);

                            
                        },
                        error:function(param,param1,param2){
                            alert(param.responseText);
                        }
                    });
                }

                var PB_'.$config['divId'].' = {};
                PB_'.$config['divId'].'.pictureBoxPage = 1;
                PB_'.$config['divId'].'.id = "'.$id.'";
                PB_'.$config['divId'].'.elementId = '.$elementId.';



                refreshPictureBox("'.$config['divId'].'",PB_'.$config['divId'].');
               
                
    ';
$this->registerJs($thisPictureBoxScript, 3, 'pictureBox-js');


?>

<div id="<?php echo $config['divId']?>" style="height:400px;width:100%;">
    
</div>





