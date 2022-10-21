<?php

namespace WC\Model;

use PDO;

/**
 * Abstração do Model
 */
abstract class Model 
{
    
    /**
     * Armazena a intância da conexão
     * @var PDO
     */
    protected PDO $db;
    
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    
}
