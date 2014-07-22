<?php

$config = array
(
    'db'        => array
    (
        'default'   => array
        (
            'driver'            => 'Pdo',
            //'host'              => 'localhost',
            //'port'              => '8889',
            //'dbname'          => 'newslettercms',
            'dsn'               => 'mysql:dbname=tests;host=localhost;port=8889',
            'username'          => 'root',
            'password'           => 'root',
            'charset'           => 'utf8',
            'driver_options'    => array
            (
                PDO::ATTR_EMULATE_PREPARES          => 1,
                PDO::MYSQL_ATTR_USE_BUFFERED_QUERY  => 1,
                PDO::MYSQL_ATTR_INIT_COMMAND      => 'SET NAMES \'UTF8\';SET SQL_BIG_SELECTS = 1;SET SQL_MAX_JOIN_SIZE = 18446744073709551615;',
                //PDO::MYSQL_ATTR_INIT_COMMAND        => 'SET NAMES \'UTF8\';',
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
                'module'        => 'default',
                'submodule'     => 'newsletter',
                'controller'    => 'index',
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
        'newsletter-navigation'    => array
        (
            'route'     => 'nl\/navigation\/?',
            'defaults'  => array
            (
                'module'        => 'default',
                'submodule'     => 'newsletter',
                'controller'    => 'index',
                'action'        => 'navigation',
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
        
        'newsletter-project-add'    => array
        (
            'route'     => 'nl\/project\/add\/?',
            'defaults'  => array
            (
                'module'        => 'default',
                'submodule'     => 'newsletter',
                'controller'    => 'project',
                'action'        => 'add',
                'project_id'    => '-1',
            ),
            'map'       => array(),
            'reverse'   => 'nl/project/add',
            'callbacks' => array(),
        ),
        'newsletter-project-edit'    => array
        (
            'route'     => 'nl\/project\/(-?\\d+)\/edit\/?',
            'defaults'  => array
            (
                'module'        => 'default',
                'submodule'     => 'newsletter',
                'controller'    => 'project',
                'action'        => 'edit',
                'project_id'    => '-1',
            ),
            'map'       => array
            (
                'project_id'    => '1',
            ),
            'reverse'   => 'nl/project/%1$s/edit',
            'callbacks' => array(),
        ),
        'newsletter-project-list'    => array
        (
            'route'     => 'nl\/project\/?',
            'defaults'  => array
            (
                'module'        => 'default',
                'submodule'     => 'newsletter',
                'controller'    => 'project',
                'action'        => 'list',
            ),
            'map'       => array(),
            'reverse'   => 'nl/project',
            'callbacks' => array(),
        ),
        'newsletter-project-view'    => array
        (
            'route'     => 'nl\/project\/(-?\\d+)\/?',
            'defaults'  => array
            (
                'module'        => 'default',
                'submodule'     => 'newsletter',
                'controller'    => 'project',
                'action'        => 'view',
                'project_id'    => '-1',
            ),
            'map'       => array
            (
                'project_id'    => '1',
            ),
            'reverse'   => 'nl/project/%1$s',
            'callbacks' => array(),
        ),
        
        'newsletter-topic-add'    => array
        (
            'route'     => 'nl\/project\/(-?\\d+)\/topic\/add\/?',
            'defaults'  => array
            (
                'module'        => 'default',
                'submodule'     => 'newsletter',
                'controller'    => 'topic',
                'action'        => 'add',
                'project_id'    => '-1',
                'topic_id'      => '-1',
            ),
            'map'       => array
            (
                'project_id'    => '1',
            ),
            'reverse'   => 'nl/project/%1$s/topic/add',
            'callbacks' => array(),
        ),
        'newsletter-topic-edit'    => array
        (
            'route'     => 'nl\/project\/(-?\\d+)\/topic\/(-?\\d+)\/edit\/?',
            'defaults'  => array
            (
                'module'        => 'default',
                'submodule'     => 'newsletter',
                'controller'    => 'topic',
                'action'        => 'edit',
                'project_id'    => '-1',
                'topic_id'      => '-1',
            ),
            'map'       => array
            (
                'project_id'    => '1',
                'topic_id'      => '2',
            ),
            'reverse'   => 'nl/project/%1$s/topic/%2$s/edit',
            'callbacks' => array(),
        ),
        'newsletter-topic-list'    => array
        (
            'route'     => 'nl\/project\/(-?\\d+)\/topic\/?',
            'defaults'  => array
            (
                'module'        => 'default',
                'submodule'     => 'newsletter',
                'controller'    => 'topic',
                'action'        => 'list',
                'project_id'    => '-1',
            ),
            'map'       => array
            (
                'project_id'    => '1',
            ),
            'reverse'   => 'nl/project/%1$s/topic',
            'callbacks' => array(),
        ),
        'newsletter-topic-view'    => array
        (
            'route'     => 'nl\/project\/(-?\\d+)\/topic\/(-?\\d+)\/?',
            'defaults'  => array
            (
                'module'        => 'default',
                'submodule'     => 'newsletter',
                'controller'    => 'topic',
                'action'        => 'view',
                'project_id'    => '-1',
                'topic_id'      => '-1',
            ),
            'map'       => array
            (
                'project_id'    => '1',
                'topic_id'      => '2',
            ),
            'reverse'   => 'nl/project/%1$s/topic/%2$s',
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