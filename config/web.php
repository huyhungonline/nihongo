<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [

        'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-basic-app'
                          ],
                    ],
        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'wrwetedrgdsyredgersyghs',
        ],

        'access' => [
            'class' => 'yidas\filters\AccessRouter',
            'except' => ['site/login', 'site/register'],
            'httpAuth' => [
                'enable' => true,
                'denyCallback' => function() {
                    $response = Yii::$app->response;
                    $response->statusCode = 401;
                    $response->format = \yii\web\Response::FORMAT_JSON;
                    $response->data = ['message' => 'Access Denied'];
                    return $response->send();
                },
            ],
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                 '/'      => 'home/home',
                 '/login' =>  'site/login',
                 '/register' =>  'register/register',
                 '/postregister' =>  'register/postregister',
                 '/postlogin'  =>  'login/postlogin',
                 '/home'       =>  'home/home',
                 '/sentence'       =>  'sentence/index',
                 '/game'       =>  'game/index',
                 '/test/index'   =>   'test/index',
                 '/test/home'   =>   'test/home',
                 '/site'   =>   'site/index',
                 'test/<level:\d+>/<jlpt>'=>'test/index',
                 '/new' =>  'new/index',
                 '/post/comment/<id:\d+>' =>  'post/comment',
                 '/post/create' =>  'post/create',
                 '/post/delete/<id:\d+>' =>  'post/delete',
                 '/post/createcomment' =>  'post/createcomment',
                 '/post/deletecomment/<id:\d+>' =>  'post/deletecomment',
                 '/post/test' =>  'post/test',
                 '/upload' =>  'file/upload',
                 '/sendmoney/index' =>  'file/index',
                 '/order/status' =>  'order/status',
                 '/status_money' =>  'file/status_money',
                 '/user/index' =>  'user/index',
                 '/user/comment' =>  'user/comment',

                 // input
                 '/input/input1234' =>  '/input/input1234',
            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
