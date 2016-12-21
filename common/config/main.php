<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            'dsn' => 'mongodb://localhost:27017/mydatabase',
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
