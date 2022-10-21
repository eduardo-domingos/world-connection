<?php

namespace App\Controllers;

use WC\Controller\Action;
use WC\Model\Container;

class PagesController extends Action
{
     
    /**
     * Renderiza a View Home
     * @return void
     */
    public function index(): void
    {
       $project = Container::getModel('Project');
       
       $this->view->data = $project->getProjects();
       
       $this->render('index', 'layout');
    }
    
    /**
     * Renderiza a View Sobre
     * @return void
     */
    public function about(): void
    {  
       $this->render('about', 'layout');
    }
    
}
