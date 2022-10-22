<?php

namespace App\Core;

/**
 * Carrega variáveis de ambiente, para configurar o projeto em si
 */
class Environment 
{
    
   /**
    * Carrega varíaveis de ambiente para configurar o projeto
    * @param $dir string
    * @return void
    */
   public static function loadVariables(string $dir): void
   {
        $lines = file($dir.'/.env');

        foreach($lines as $line){
            putenv(trim($line));
        }
       
   }
   
   /**
    * Verifica se o arquivo env existe
    * @return bool
    */
   public static function verifyEnv(): bool
   {
       if(file_exists($dir.'/.env')){
           return true;
       }else{
           return false;
       }
        
   }
    
}