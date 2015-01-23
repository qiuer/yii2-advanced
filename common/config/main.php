<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mongodb' => [
            'class' => yii\mongodb\Connection::className(),
            'dsn' => 'mongodb://root:123456@localhost:27017/advanced', //每个数据库都需要添加用户，用于认证
        ],
//        'mongodbCache' => [
//            'class' => yii\mongodb\Cache::className()
//        ],
//        'mongodbSession' => [
//            'class' => yii\mongodb\Session::className()
//        ],
    ],
];
