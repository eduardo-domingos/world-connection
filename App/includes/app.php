<?php

require __DIR__.'/../../App/config/constants.php';

require __DIR__.'/../../App/debug/phpError.php';

require __DIR__.'/../../vendor/autoload.php';
 
use App\Core\Environment;
use App\Core\Session;

Session::init();

if(Environment::verifyEnv()){
    Environment::loadVariables(__DIR__.'/../env');
}else{
    exit("o arquivo .env precisa ser configurado na pasta App\\env\\.env");
}