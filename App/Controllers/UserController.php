<?php

namespace App\Controllers;

use WC\Controller\Action;
use WC\Model\Container;
use App\Core\Session;

 
class UserController extends Action
{
    /**
     * Renderiza a View de cadastro do usuário
     * @return void
     */
     public function register(): void
    {
        $this->view->registerError = false;
        
        $this->view->userForm = [
                'name'           => "",
                'email'          => "",
                'cpfCnpj'        => "",
                'phone'          => "",
                'typePerson'     => "",
                'password'       => "",
                'repeatPassword' => ""
            ];
        
        $this->render('register', 'layout_login');
    }
    
    /**
     * Salva o cadastro do usuário e renderiza a view
     * @return void
     */
    public function saveRegister(): void
    {
        $user = Container::getModel('User');
        
        $name = htmlspecialchars(strip_tags($_POST['name']));
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $cpfCnpj = htmlspecialchars(strip_tags($_POST['cpfCnpj']));
        $phone = htmlspecialchars(strip_tags($_POST['phone']));
        $typePerson = htmlspecialchars(strip_tags($_POST['typePerson']));
        $password = htmlspecialchars(strip_tags($_POST['password']));
        $repeatPassword = htmlspecialchars(strip_tags($_POST['repeatPassword']));
        
        $user->__set('name', $name);
        $user->__set('email', $email);
        $user->__set('cpfCnpj', $cpfCnpj);
        $user->__set('phone', $phone);
        $user->__set('typePerson', $typePerson);
        $user->__set('password', $password);
        $user->__set('repeatPassword', $repeatPassword);
        
        if(count(($user->validInsertUser())) === 0 && count($user->getUserByEmail()) === 0){
            
            $user->insertUser();
            
            $this->render('register', 'layout_login');
            
        }else{
            
            $this->view->userForm = [
                'name'           => $_POST['name'],
                'email'          => $_POST['email'],
                'cpfCnpj'        => $_POST['cpfCnpj'],
                'phone'          => $_POST['phone'],
                'typePerson'     => $_POST['typePerson'],
                'password'       => $_POST['password'],
                'repeatPassword' => $_POST['repeatPassword']
            ];
            
            $this->view->registerError = true;
            
            $this->render('register', 'layout_login');
        }
        
    } 
    
    /**
     * Renderiza a View de login do usuário
     * @return void
     */
    public function login(): void
    {
        $this->view->login = $_GET['login'] ?? "";
        $this->render('login', 'layout_login');
    }
    
    /**
     * Realiza o login
     * @return void
     */
    public function autentication(): void
    {
        $user = Container::getModel('User');
        
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $password = htmlspecialchars(strip_tags($_POST['password']));
        
        $user->__set('email',$email);
        $user->__set('password', $password);
        
        $userData = $user->autentication();
        
        if(is_object($userData) && !empty($userData->__get('id')) && !empty($userData->__get('email'))){
            
            Session::login($userData);
            
            header('Location: '.URL_PREFIX.'/');
            
        }else{
            header('Location: '.URL_PREFIX.'/login?login=error');
        }
    }
    
    /**
     * Faz o logout, fecha a sessão
     * @return void
     */
    public function logout(): void
    {
        Session::logout();
        header('Location: '.URL_PREFIX.'/');
    }
    
    /**
     * Renderiza a View de Perfil do usuário
     * @return void
     */
    public function profile(): void
    {
        if(isset($_SESSION['user']['id']) && isset($_SESSION['user']['name']) && isset($_SESSION['user']['email'])){
            
            $user = Container::getModel('User');
            $user->__set('id', $_SESSION['user']['id']);
            
            $user->getUserProfileById();
            
            $this->view->userProfile = [
                'name' => $user->__get('name'),
                'email' => $user->__get('email'),
                'phone' => $user->__get('phone'),
                'cpfCnpj' => $user->__get('cpfCnpj'),
                'typePerson' => $user->__get('typePerson')
            ];
            
            $this->render('profile', 'layout');
            
        }else{
             header('Location: '.URL_PREFIX.'/login?login=error');
        }
    }
}
