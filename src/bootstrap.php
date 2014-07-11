<?php

ini_set('display_startup_errors', true);

ini_set('display_errors', true);

ini_set('error_reporting', -1);

error_reporting(-1);

date_default_timezone_set('UTC');

ini_set('log_errors', 1);

ini_set('error_log', dirname(__FILE__) . '/_errorlog/' . date('Y-m-d') . '.php.log');

if (! file_exists(dirname(__FILE__) . '/_errorlog/') || ! is_dir(dirname(__FILE__) . '/_errorlog/'))
{
    mkdir(dirname(__FILE__) . '/_errorlog/', 0777, true);
}

//load autoloader from projects-libraries-composer-summary
require_once dirname(dirname(dirname(__FILE__))) . '/projects-libraries-composer-summary/vendor/autoload_52.php';

require_once dirname(__FILE__) . '/controllers/include.php';

$config = include dirname(__FILE__) . '/config/newslettercms.config.php';

$mvc = EhrlichAndreas_Mvc_FrontController::getInstance();

$mvc->addRouterConfig($config, 'router');

$mvc->addViewConfig($config, 'view');

