<?php

require __DIR__.'/../../vendor/autoload.php';
 
use App\Core\Environment;
use App\Core\Session;

Session::init();

if(Environment::verifyEnv(__DIR__.'/../env')){
    Environment::loadVariables();
}else{
    exit("o arquivo .env precisa ser configurado na pasta App\\env\\.env");
}