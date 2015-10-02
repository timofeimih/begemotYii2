<?php

//Move this file into application.config
//for implement new configuration in any new site
return array(
    'divId' => 'pictureBox',
    'nativeFilters' => array(
        'main' => true,
        'innerSmall' => true,
        'slider' => true,
        'one' => true,
        'two' => false,
        'three' => true,
        'big_watermark'=>true,
    ),
    'filtersTitles' => array(
        'main' => '965 433',
        'innerSmall' => '94 73',
        'slider' => '133 86',
        'one' => '215 143',
        'two' => '341 248',
        'three' => '248 164',
        'big_watermark'=>'водянка'
    ),
    'imageFilters' => array(
        'big_watermark'=>array(
            0 => array(
                'filter' => 'WaterMark',
                'param' => array(
                    'watermark' => '/images/watermark.png',
                ),
            ),
        ),
        'main' => array(
            0 => array(
                'filter' => 'CropResize',
                'param' => array(
                    'width' => 965,
                    'height' => 433,
                ),
            ),
        ),
        'innerSmall' => array(
            0 => array(
                'filter' => 'CropResize',
                'param' => array(
                    'width' => 94,
                    'height' => 73,
                ),
            ),
        ),
        'slider' => array(
            0 => array(
                'filter' => 'CropResize',
                'param' => array(
                    'width' => 133,
                    'height' => 86,
                ),
            ),
        ),
        'one' => array(
            0 => array(
                'filter' => 'CropResize',
                'param' => array(
                    'width' => 215,
                    'height' => 143,
                ),
            ),
        ),
        'two' => array(
            0 => array(
                'filter' => 'CropResize',
                'param' => array(
                    'width' => 341,
                    'height' => 248,
                ),
            ),
        ),
        'three' => array(
            0 => array(
                'filter' => 'CropResize',
                'param' => array(
                    'width' => 248,
                    'height' => 164,
                ),
            ),
        ),
    ),
//    'original' => array(
//        1 => array(
//            'filter' => 'WaterMark',
//            'param' => array(
//                'watermark' => '/images/watermark.png',
//            ),
//        ),
//    ),
);
?>
