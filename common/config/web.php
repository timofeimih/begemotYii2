<?php
$config = [
    'components' => [
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'linkAssets' => true,
            'appendTimestamp' => YII_ENV_DEV
        ]
    ],
    // Если надо мультиязычность, то тут надо включить.
    // 'as locale' => [
    //     'class' => 'common\behaviors\LocaleBehavior'
    // ]
];

if (YII_DEBUG) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.33.1'],
    ];
}

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.33.1'],
    ];
}


return $config;
