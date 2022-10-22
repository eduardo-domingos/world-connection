<?php

namespace App\Core;

/**
 * Carrega variáveis de ambiente, para configurar o projeto em si
 */
class Environment 
{
    
    private static $pathFile;
    
   /**
    * Carrega varíaveis de ambiente para configurar o projeto
    * @return void
    */
   public static function loadVariables(): void
   {
        $lines = file(self::$pathFile.'/.env');

        foreach($lines as $line){
            putenv(trim($line));
        }
       
   }
   
   /**
    * Verifica se o arquivo env existe
    * @param string $dir
    * @return bool
    */
   public static function verifyEnv(string $dir): bool
   {
       if(file_exists($dir.'/.env')){
           self::$pathFile = $dir;
           return true;
       }else{
           return false;
       }
        
   }
    
}