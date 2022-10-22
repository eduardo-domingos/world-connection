<?php

namespace App\Core;

use PDO;
use PDOException;

class Connection 
{
    
    /**
     * Retorna conexão com o banco
     * @return PDO
     */
    public static function getDb(): PDO
    {
        try{
            
            $options = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE   => PDO::ERRMODE_EXCEPTION
            ];
            
            return (new PDO('mysql:host='.getenv('DB_HOST').';port='.getenv('DB_PORT').';charset='.getenv('DB_CHAR').';dbname='.getenv('DB_BASE'),  getenv('DB_USER'), getenv('DB_PASS'), $options));
            
        } catch (PDOException $error) {
            phpError($error->getCode(),  $error->getMessage(), $error->getFile(), $error->getLine());
            exit();
        }
    }
    
}
