<?php
return [
    'language' => 'zh-CN',
    'timeZone' => 'Asia/Shanghai',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'redis' => [
            'class' => \yii\redis\Connection::class,
            'retries' => 1,
        ],
        'cache' => [
            'class' => 'yii\redis\Cache',
            'redis' => 'redis',
            'keyPrefix' => 'yii2_admin:',
        ],
        'assetManager' => [
            'appendTimestamp' => true,
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '--',
            'defaultTimeZone' => 'Asia/Shanghai',
            'dateFormat' => 'yyyy-MM-dd',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
        ],
        'config' => [
            'class'         => 'abhimanyu\config\components\Config', // Class (Required)
            'db'            => 'db',                                 // Database Connection ID (Optional)
            'tableName'     => '{{%config}}',                        // Table Name (Optioanl)
            'cacheId'       => 'cache',                              // Cache Id. Defaults to NULL (Optional)
            'cacheKey'      => 'config.cache',                       // Key identifying the cache value (Required only if cacheId is set)
            'cacheDuration' => 100                                   // Cache Expiration time in seconds. 0 means never expire. Defaults to 0 (Optional)
        ],
        'session' => [
            'class' => 'yii\web\Session',
            'timeout' => 24 * 3600,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'scheme' => 'smtps',
                'host' => 'smtp.163.com',
                'username' => '',
                'password' => '',
                'port' => 587,
            ],
        ],
        'log' => [
            'traceLevel' => 3,
            'targets' => [
                'app' => [
                    'class' => 'common\components\EFileTarget',
                    'levels' => ['error', 'warning', 'info'],
                    'logVars' => ['_GET', '_POST', '_SESSION'],
                    'except' => [
                        'api',
                        'yii\base\UserException',
                        'yii\db\*',
                    ],
                    'logFile' => '@runtime/logs/app.log',
                    'maxLogFiles' => 30,
                ],
                'api' => [
                    'class' => 'common\components\EFileTarget',
                    'levels' => ['error', 'warning', 'info', 'trace'],
                    'categories' => ['api', 'yii\base\UserException'],
                    'logVars' => ['_GET', '_POST', '_SESSION'],
                    'logFile' => '@runtime/logs/api.log',
                    'maxLogFiles' => 30,
                ],
                'email' => [
                    'class' => 'yii\log\EmailTarget',
                    'mailer' => 'mailer',
                    'levels' => ['error'],
                    'except' => [
                        'yii\base\UserException',
                        'yii\web\HttpException:404',
                        'yii\web\HttpException:400',
                        'yii\web\HttpException:403',
                        'common\base\*',
                    ],
                    'logVars' => ['_GET', '_POST', '_SESSION'],
                    'message' => [
                        'from' => [],
                        'to' => [''],
                        'subject' => '',
                    ],
                ],
                'db' => [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    'logVars' => ['_GET', '_POST', '_SESSION'],
                    'except' => [
                        'yii\base\UserException',
                        'yii\web\HttpException:404',
                        'yii\web\HttpException:400',
                        'yii\web\HttpException:403',
                    ],
                ],
                'debug' => [
                    'class' => 'common\components\EFileTarget',
                    'levels' => ['error', 'warning', 'info', 'trace'],
                    'maxLogFiles' => 30,
                    'categories' => ['debug'],
                    'logVars' => ['_GET', '_POST', '_SESSION'],
                    'logFile' => '@runtime/logs/debug.log',
                    'maxLogFiles' => 30,
                ],
                'sql' => [
                    'class' => 'common\components\EFileTarget',
                    'levels' => ['error', 'warning', 'info', 'trace'],
                    'categories' => ['yii\db\Command::execute', 'yii\db\Command::query'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/sql.log',
                    'maxLogFiles' => 30,
                ],
            ],
        ],
        'queue' => [
            'class' => \yii\queue\redis\Queue::class,
            'redis' => 'redis',
            'as log' => \yii\queue\LogBehavior::class,
        ],
        'mutex' => [
            'class' => \yii\redis\Mutex::class,
            'redis' => 'redis',
        ],
    ],
    'modules' => [
        'region' => [
            'class' => 'backend\modules\region\Module',
        ],
    ]
];
