<?php

use abdualiym\cms\Module;
use abdualiym\slider\Module as SliderModule;

$params = array_merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
return [
    'timezone' => 'Asia/Tashkent',
    'sourceLanguage' => 'en',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@frontendHostInfo' => $params['frontendHostInfo'],
        '@backendHostInfo' => $params['backendHostInfo'],
        '@storageRoot' => $params['staticPath'],
        '@storageHostInfo' => $params['storageHostInfo'],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'reCaptcha' => [
            'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
            'siteKeyV2' => '6LdIOdgUAAAAAMP2fbeF1PISdXAodqnHpPzLcfAO',
            'secretV2' => '6LdIOdgUAAAAAK5vmi8Y8ZzHw0ZmnmR1gmZqK4nM',
            'siteKeyV3' => 'your siteKey v3',
            'secretV3' => 'your secret key v3',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => '{{%auth_items}}',
            'itemChildTable' => '{{%auth_item_children}}',
            'assignmentTable' => '{{%auth_assignments}}',
            'ruleTable' => '{{%auth_rules}}',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
    ],
    'modules' => [
        'slider' => [
            'class' => SliderModule::class,
            'storageRoot' => '@storageRoot',
            'storageHost' => '@storageHostInfo',
            'thumbs' => [ // 'sm' and 'md' keys are reserved
                'admin' => ['width' => 128, 'height' => 128],
                'thumb' => ['width' => 320, 'height' => 320],
            ],
            'languages' => [
                'ru' => [
                    'id' => 0,
                    'name' => 'Русский',
                ],
                'en' => [
                    'id' => 1,
                    'name' => 'English',
                ],
                'uz' => [
                    'id' => 2,
                    'name' => 'O`zbek tili',
                ],
            ],
        ],
        'cms' => [
            'class' => Module::class,
            'storageRoot' => '@storageRoot',
            'storageHost' => '@storageHostInfo',
            'thumbs' => [ // 'sm' and 'md' keys are reserved
                'admin' => ['width' => 128, 'height' => 128],
                'thumb' => ['width' => 320, 'height' => 320],
            ],
            'languages' => [
                'ru' => [
                    'id' => 0,
                    'name' => 'Русский',
                ],
                'en' => [
                    'id' => 1,
                    'name' => 'English',
                ],
                'uz' => [
                    'id' => 2,
                    'name' => 'O`zbek tili',
                ],
            ],
            'menuActions' => [ // for add to menu controller actions
                '' => 'Home',
                'services/index' => 'Services',
                'feedback/create' => 'Contacts',
                'distributors/index' => 'Distributors',
                'orders/index' => 'Orders',
            ]
        ],
    ],
];
