<?php

require __DIR__.'/../../App/config/constants.php';

require __DIR__.'/../../App/debug/phpError.php';

require __DIR__.'/../../vendor/autoload.php';
 
use App\Core\Environment;
use App\Core\Session;

Session::init();

Environment::loadVariables(__DIR__.'/../env');
