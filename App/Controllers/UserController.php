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
                'name'                 => "",
                'email'                => "",
                'cpf'                  => "",
                'cnpj'                 => "",
                'phone'                => "",
                'typePerson'           => "",
                'password'             => "",
                'repeatPassword'       => "",
                'name_error'           => "",
                'email_error'          => "",
                'cpf_error'            => "",
                'cnpj_error'           => "",
                'phone_error'          => "",
                'password_error'       => "",
                'repeatPassword_error' => ""
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
        $cpfCnpj = htmlspecialchars(strip_tags($_POST['cpf'] ?? $_POST['cnpj']));
        $phone = htmlspecialchars(strip_tags($_POST['phone']));
        $typePerson = htmlspecialchars(strip_tags($_POST['person']));
        $password = htmlspecialchars(strip_tags($_POST['password']));
        $repeatPassword = htmlspecialchars(strip_tags($_POST['repeatPassword']));
        
        $user->__set('name', $name);
        $user->__set('email', $email);
        $user->__set('cpfCnpj', $cpfCnpj);
        $user->__set('phone', $phone);
        $user->__set('typePerson', $typePerson);
        $user->__set('password', $password);
        $user->__set('repeatPassword', $repeatPassword);
        
        $valid = $user->validInsertUser();

        if(count($valid) === 0 && count($user->getUserByEmail()) === 0){
            
            $user->insertUser();
            
            $this->render('register', 'layout_login');
            
        }else{
            
            $this->view->userForm = [
                'name'                 => $_POST['name'],
                'email'                => $_POST['email'],
                'cpf'                  => $_POST['cpf'] ?? '',
                'cnpj'                 => $_POST['cnpj'] ?? '',
                'phone'                => $_POST['phone'],
                'typePerson'           => $_POST['person'],
                'password'             => $_POST['password'],
                'repeatPassword'       => $_POST['repeatPassword'],
                'name_error'           => $valid['name_error'] ?? '',
                'email_error'          => $valid['email_error'] ?? '',
                'cpf_error'            => $valid['cpf_error'] ?? '',
                'cnpj_error'           => $valid['cnpj_error'] ?? '',
                'phone_error'          => $valid['phone_error'] ?? '',
                'password_error'       => $valid['password_error'] ?? '',
                'repeatPassword_error' => $valid['repeatPassword_error'] ?? ''
            ];
            
            $this->render('register', 'layout_login');
        }
        
    } 
    
    /**
     * Renderiza a View de login do usuário
     * @return void
     */
    public function login(): void
    {

        $this->view->userForm = [
            'email'          => '',
            'password'       => '',
            'login_error'    => ''
        ];

        $this->render('login', 'layout_login');
    }
    
    /**
     * Realiza o login
     * @return void
     */
    public function autentication(): void
    {
        $user = Container::getModel('User');
        
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
        $password = htmlspecialchars(strip_tags($_POST['password']));
        
        $user->__set('email', $email);
        $user->__set('password', $password);
        
        $userData = $user->autentication();
        
        if(is_object($userData) && !empty($userData->__get('id')) && !empty($userData->__get('email'))){
            
            Session::login($userData);
            
            header('Location: '.URL_PREFIX.'/');
            die();
            
        }else{

            $this->view->userForm = [
                'email'          => $_POST['email'],
                'password'       => $_POST['password'],
                'login_error'    => 'Email ou Senha inválidos'
            ];

            $this->render('login', 'layout_login');
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
        die();
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
             header('Location: '.URL_PREFIX.'/login');
             die();
        }
    }
}