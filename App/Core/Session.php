<?php

namespace App\Core;

use App\Models\User;

class Session 
{
    
    /**
     * Inicia a sessão
     * @return void
     */
    public static function init(): void
    {
        
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        
    }
    
    /**
     * Cria a sessão com os dados do usuário
     * @param User $user
     * @return void
     */
    public static function login(User $user): void
    {
        self::init();
        
        $_SESSION['user'] = [
            'id'    => $user->__get('id'),
            'name'  => $user->__get('name'),
            'email' => $user->__get('email')
        ];
        
    }
    
    /**
     * Verifica se está logado
     * @return booelan
     */
    public static function isLogged()
    {
        self::init();
        
        return isset($_SESSION['user']['id']);
    }
    
    /**
     * desloga a sessão
     * @return boolean
     */
    public static function logout()
    {
        
        self::init();
        
        unset($_SESSION['user']);
        session_destroy();
        
    }
    
}