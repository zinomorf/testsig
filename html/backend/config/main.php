<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
        ],        
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => 'admin',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                
                // admin
                //'backend/admin'=>'admin/index',
               
                //'backend/web/<controller:\w+>' => '<controller>/index',
               

                /*'admin/<action:\w+>/<id_tree:\w+>'=>'admin/<action>',
                'admin/<action:\w+>/<id_tree:\w+>/<pid:\w+>'=>'admin/<action>',
                'admin/<action:\w+>/<id_tree:\w+>/<id_page:\w+>/<pid:\w+>'=>'admin/<action>',*/
                
                '' => 'admin/index',                                
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',

            ],
        ],
        
    ],
    'params' => $params,
];
