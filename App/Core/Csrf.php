<?php

namespace App\Core;

class Csrf
{

    /**
     * Gera o Token
     * @return void
     */
    public static function generateToken(): void
    {

        if(!isset($_SESSION['token'])){
            $_SESSION['token'] = md5(uniqid(mt_rand(), true));
        }else{
           unset($_SESSION['token']);
           $_SESSION['token'] = md5(uniqid(mt_rand(), true));
        }
        
        echo $_SESSION['token'];
    }

    /**
     * Verifica se o token recebido, corresponde com o token gerado
     * @return bool
     */
    public static function verifyToken(string $token): bool
    {
        if(!isset($_SESSION['token'])){
            return false;
        }else{
            if($_SESSION['token'] !== $token){
                return false;
            }
        }

        return true;
    }

}