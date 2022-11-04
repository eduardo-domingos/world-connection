<?php

namespace App\Core;

use PDO;
use PDOException;

class Connection 
{
    
    /**
     * Contém a instância da conexão
     * @var PDO 
     */
    protected static PDO $db;
    
    private function __construct(){}
    private function __clone(){}
    public function __wakeup(){}

    /**
     * Se não existe a conexão com o banco, cria
     * Se existir a conexão com o banco, retorna a existente
     * @return PDO
     */
    public static function getDb(): PDO
    {

        try{

            if(empty(self::$db)){
            
                $options = [
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE   => PDO::ERRMODE_EXCEPTION
                ];
                
                self::$db = (new PDO('mysql:host='.getenv('DB_HOST').';port='.getenv('DB_PORT').';charset='.getenv('DB_CHAR').';dbname='.getenv('DB_BASE'),  getenv('DB_USER'), getenv('DB_PASS'), $options));

            }

            return self::$db;
            
        } catch (PDOException $error) {
            phpError($error->getCode(),  $error->getMessage(), $error->getFile(), $error->getLine());
            exit();
        }

    }
    
}