<?php

namespace WC\Model;

use App\Core\Connection;

/**
 * Abstração para chamar o Model
 */
class Container 
{
    
    /**
     * Intância o Model junto com a instância do banco de dados
     * @param type $model
     * @return \WC\Model\class
     */
    public static function getModel($model)
    {
        $conn = Connection::getDb();
        
        $class = "\\App\\Models\\".ucfirst($model);
        
        return new $class($conn);   
    }
    
}
