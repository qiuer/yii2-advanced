<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'tencent' => [
                    'class' => 'frontend\oauth\Tencent',
                    'clientId' => '1****472',
                    'clientSecret' => '5dc5a04f0******34f85525***53e4',
                ],
                'sina' => [
                    'class' => 'frontend\oauth\Sina',
                    'clientId' => '246****34',
                    'clientSecret' => '5d24d***f1ebea******e405',
                ],
                'douban' => [
                    'class' => 'frontend\oauth\Douban',
                    'clientId' => '000c******d2e0025***f1b78a',
                    'clientSecret' => '63***aeebc****7',
                ],
                'wechat' => [
                    'class' => 'frontend\oauth\Wechat',
                    'clientId' => 'wxaa***33fd***3b6',
                    'clientSecret' => 'd*****89db2cfff4e****5b',
                ]
            ],
        ],

    ],
    'params' => $params,
];
