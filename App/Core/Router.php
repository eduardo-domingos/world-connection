<?php

namespace App\Core;

use WC\Init\Bootstrap;

/**
 * Classe que lida com as rotas do sistema
 */
class Router extends Bootstrap
{
    
    /**
     * Configura as rotas do sistema
     * @return void
     */
    protected function ConfigRoutes(): void
    {
        $routes['homeView'] = [
            'route'      => '/',
            'controller' => 'PagesController',
            'action'     => 'index',
            'request_method' => 'GET'
        ];
        
        $routes['sobreView'] = [
            'route'      => '/about',
            'controller' => 'PagesController',
            'action'     => 'about',
            'request_method' => 'GET'
        ];
        
        $routes['projetosView'] = [
            'route'      => '/projects',
            'controller' => 'ProjectController',
            'action'     => 'projects',
            'request_method' => 'GET'
        ];
        
        $routes['criarProjetosView'] = [
            'route'      => '/createproject',
            'controller' => 'ProjectController',
            'action'     => 'createProject',
            'request_method' => 'GET'
        ];
        
        $routes['criarProjetosForm'] = [
            'route'      => '/project/create',
            'controller' => 'ProjectController',
            'action'     => 'saveProject',
            'request_method' => 'POST'
        ];
        
        $routes['registroView'] = [
            'route' => '/register',
            'controller' => 'UserController',
            'action' => 'register',
            'request_method' => 'GET'
        ];
        
        $routes['registroForm'] = [
            'route' => '/register',
            'controller' => 'UserController',
            'action' => 'saveRegister',
            'request_method' => 'POST'
        ];
        
        $routes['loginView'] = [
            'route'      => '/login',
            'controller' => 'UserController',
            'action'     => 'login',
            'request_method' => 'GET'
        ];
        
        $routes['loginForm'] = [
            'route'      => '/autentication',
            'controller' => 'UserController',
            'action'     => 'autentication',
            'request_method' => 'POST'
        ];
        
        $routes['perfilView'] = [
            'route'      => '/profile',
            'controller' => 'UserController',
            'action'     => 'profile',
            'request_method' => 'GET'
        ];
        
        $routes['logout'] = [
            'route'      => '/logout',
            'controller' => 'UserController',
            'action'     => 'logout',
            'request_method' => 'GET'
        ];
        
        $this->setRoutes($routes);
        
    }
    
}
