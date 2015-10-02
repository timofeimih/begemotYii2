<?php

class WaterMarkFilter extends BaseFilter {

    public function make() {

        $image = new Imagick();
        $image->readImage($this->fileName);

        $watermark = new Imagick();
        
        $watermarkFile = Yii::getPathOfAlias('webroot') . '/' . $this->param['watermark'];
        
        if (file_exists($watermarkFile)){
            $watermark->readImage($watermarkFile);
            
        }else {
           $watermark->newPseudoImage(100, 100, "magick:rose");  
        }

        // how big are the images?
        $iWidth = $image->getImageWidth();
        $iHeight = $image->getImageHeight();
        $wWidth = $watermark->getImageWidth();
        $wHeight = $watermark->getImageHeight();

        if ($iHeight < $wHeight || $iWidth < $wWidth) {
            //resize the watermark
            $watermark->scaleImage($iWidth, $iHeight);

            // get new size
            $wWidth = $watermark->getImageWidth();
            $wHeight = $watermark->getImageHeight();
        }

        // calculate the position
        $x = ($iWidth - $wWidth) / 2;
        $y = ($iHeight - $wHeight) / 2;

        $image->compositeImage($watermark, imagick::COMPOSITE_OVER, $x, $y);

        $image->writeImage($this->newFileName);
        $image->clear();
        $image->destroy();

        $watermark->clear();
        $watermark->destroy();
    }

}

?>
