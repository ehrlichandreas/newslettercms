<?php

$config = array
(
    'db'        => array
    (
        'default'   => array
        (
            'driver'            => 'Pdo',
            //'host'            => 'localhost',
            //'port'            => '3306',
            //'dbname'          => 'newslettercms',
            'dsn'               => 'mysql:dbname=newslettercms;host=localhost',
            //'username'        => 'readCredential',
            //'password'        => '****',
            'charset'           => 'utf8',
            'driver_options'    => array
            (
                PDO::ATTR_EMULATE_PREPARES          => 1,
                PDO::MYSQL_ATTR_USE_BUFFERED_QUERY  => 1,
                //PDO::MYSQL_ATTR_INIT_COMMAND      => 'SET NAMES \'UTF8\';SET SQL_BIG_SELECTS = 1;SET SQL_MAX_JOIN_SIZE = 18446744073709551615;',
                PDO::MYSQL_ATTR_INIT_COMMAND        => 'SET NAMES \'UTF8\';',
            ),
            'dbtableprefix' => array
            (
                //'IMPORT_DATA' => 'projecta',
            ),
        ),
    ),
    'router'    => array
    (
        'article'    => array
        (
            'route'     => 'ar\/(.*)|nl',
            'defaults'  => array
            (
                'module'        => 'mainmodule',
                'submodule'     => 'default',
                'controller'    => 'article',
                'action'        => 'newsletter',
                'title'         => '',
            ),
            'map'       => array
            (
                'title'         => '1',
            ),
            'reverse'   => 'ar/%1$s',
            'callbacks' => array(),
        ),
        'newsletter'    => array
        (
            'route'     => 'nl\/(\\d+)\/(.*)|nl',
            'defaults'  => array
            (
                'module'        => 'mainmodule',
                'submodule'     => 'default',
                'controller'    => 'article',
                'action'        => 'newsletter',
                'newsletter_id' => '-1',
                'title'         => '',
            ),
            'map'       => array
            (
                'newsletter_id' => '1',
                'title'         => '2',
            ),
            'reverse'   => 'nl/%1$s/%2$s',
            'callbacks' => array(),
        ),
    ),
    
    'view'      => array
    (
        'scriptPath'    => dirname(dirname(__FILE__)) . '/views',
        'fileExtension' => 'php',
    ),
    
    'mail'      => array
    (
        array
        (
            'name'  => 'default',
            'mail'  => array
            (
                'encoding'  => 'base64',
                'from'      => array
                (
                    'email' => 'service@domain.de',
                    'name'  => 'Domain Team',
                ),
                'replyto'   => array
                (
                    'email' => 'service@domain.de',
                    'name'  => 'Domain Team',
                ),
                'to'        => array
                (
                    'email' => '%(email)%',
                    'name'  => '%(name)%'
                ),
                'cc'        => array(),
                'bcc'       => array(),
                'header'    => array(),
                'subject'   => '%(subject)%',
                'body'      => array
                (
                    'html'  => '%bodyhtml%',
                    'text'  => '%bodytext%',
                ),
                'transport' => array
                (
                    'smtp'      => true,
                    'host'      => '...',
                    'port'      => '25',
                    'auth'      => 'login',
                    'username'  => '...',
                    'password'  => '...',
                    'name'      => '...',
                ),
                'attachment'    => false,
                'eol'           => "\r\n",
                'zfversion'     => 1,
            ),
        ),
        array
        (
            'name'  => 'contactform',
            'mail'  => array
            (
                'encoding'  => 'base64',
                'from'      => array
                (
                    'email' => 'service@domain.de',
                    'name'  => 'Domain Team',
                ),
                'replyto'   => array
                (
                    'email' => 'service@domain.de',
                    'name'  => 'Domain Team',
                ),
                'to'        => array
                (
                    'email' => '%(email)%',
                    'name'  => '%(name)%'
                ),
                'cc'        => array(),
                'bcc'       => array(),
                'header'    => array(),
                'subject'   => '%(subject)%',
                'body'      => array
                (
                    'html'  => '%bodyhtml%',
                    'text'  => '%bodytext%',
                ),
                'transport' => array
                (
                    'smtp'      => true,
                    'host'      => '...',
                    'port'      => '25',
                    'auth'      => 'login',
                    'username'  => '...',
                    'password'  => '...',
                    'name'      => '...',
                ),
                'attachment'    => false,
                'eol'           => "\r\n",
                'zfversion'     => 1,
            ),
        ),
    )
);

return $config;