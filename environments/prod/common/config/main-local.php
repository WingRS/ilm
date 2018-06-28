<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;port=3306;dbname=ilm',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => parse_ini_file("/home/smtp.ini")["email"],
                'password' => parse_ini_file("/home/smtp.ini")["pass"],
                'port' => '465',
                'encryption' => 'ssl',
            ],
            'viewPath' => '@common/mail',
        ],
    ],
];
