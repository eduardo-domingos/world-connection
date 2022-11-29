<?php

namespace App\Controllers;

use WC\Controller\Action;
use WC\Model\Container;

class ProjectController extends Action 
{
    
    /**
     * Renderiza a View de Projetos
     * @return void
     */
    public function projects(): void
    {
        $this->render('projects', 'layout');
    }
    
    /**
     * Renderiza a View de Projetos
     * @return void
     */
    public function createProject(): void
    {
        if(isset($_SESSION['user']['id']) && isset($_SESSION['user']['name']) && isset($_SESSION['user']['email'])){
            
            $this->view->projectError = false;
            
            $this->render('createproject', 'layout');
        }else{
             header('Location: '.URL_PREFIX);
        }
        
    }
    
    /**
     * Renderiza a View de Projetos
     * @return void
     */
    public function saveProject(): void
    {
        
        $title    = htmlspecialchars(strip_tags($_POST['title']));
        $team     = htmlspecialchars(strip_tags($_POST['team']));
        $summary  = htmlspecialchars(strip_tags($_POST['summary']));
        $locality = htmlspecialchars(strip_tags($_POST['locality']));
        $video    = htmlspecialchars(strip_tags($_POST['video']));
        $price    = htmlspecialchars(strip_tags($_POST['price']));
        
        $project = Container::getModel('Project');
    
        $project->__set('idUser', $_SESSION['user']['id']);
        $project->__set('title', $title);
        $project->__set('team', $team);
        $project->__set('summary', $summary);
        $project->__set('locality', $locality);
        $project->__set('video', $video);
        $project->__set('price', $price);
        
        $valid = $project->validInsertProject();

        var_dump($valid);

        if(count($valid) === 0){
            $project->saveProject();
        }else{

            $this->view->userForm = [
                'email'          => $_POST['email'],
                'password'       => $_POST['password'],
                'login_error'    => 'Email ou Senha inválidos'
            ];

            $this->render('createproject', 'layout');
        }
        
    }
    
}
