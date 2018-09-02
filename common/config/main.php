<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'fa',
    'components' => [
        'urlManager' => [
            'class' => 'common\component\ZurlManager',

            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
//               '<language:\w+>/<controller>/<id:\w+>'=>'<controller>/view',
                '<language:\w+>/<controller>/<action>/<id:\w+>'=>'<controller>/<action>',
                '<language:\w+>/<controller>/<action>'=>'<controller>/<action>',
                '<language:\w+>/<action>'=>'site/<action>',
                '<language:\w+>/'=>'site/index',
//                ''=>'site/index',

//                '<language:\w+>/ticket/<action>'=>'ticket/<action>',
//                '<language:\w+>/site/<action>'=>'site/<action>',
                [
                    'class'=>'yii\rest\UrlRule',
                    'controller'=>'commenttest',
                ],
            ],
        ],

        'authManager' => [
          'class'=> 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
