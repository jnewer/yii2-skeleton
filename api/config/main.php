<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'name' => 'Yii2 API',
    'basePath' => dirname(__DIR__),
    'timeZone' => 'PRC',
    'bootstrap' => [
        'log', 'session',
        'api\modules\v1\Bootstrap',
    ],
    'controllerNamespace' => 'api\controllers',
    'defaultRoute' => 'default/index',
    'modules' => [
        'v1' => [
            'class' => 'api\modules\v1\Module',
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableSession' => true,
            'loginUrl' => null,
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-user', 'httpOnly' => false, 'path' => '/', 'domain' => '.yii2-admin.local'],
        ],
        'session' => [
            'cookieParams' => ['domain' => '.yii2-admin.local', 'lifetime' => 24 * 3600],
            'timeout' => 3600,
        ],
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            // 'rules' => require __DIR__ . '/url-rules.php',
            'rules' => [
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'request' => [
            'enableCookieValidation' => false,
            'enableCsrfValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
    ],
    'params' => $params,
];
