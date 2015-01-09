<?php

define('ROOT', dirname(__DIR__));
define('APP', ROOT . '/app/');
define('PUB', ROOT . '/public/');

//optional use of composer
if (file_exists(APP . 'vendor/autoload.php')) {
    require APP . 'vendor/autoload.php';
}

require APP . 'config.php';
require APP . 'helpers.php';
require APP . 'core.php';

Site::run();
