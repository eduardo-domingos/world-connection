<?php

namespace WC\Controller;

use stdClass;

/**
 * Abstração do Controller
 */
abstract class Action 
{
    
    /**
     * Nome do arquivo da view
     * @var stdClass
     */
    protected stdClass $view;
    
    public function __construct()
    {
        $this->view = new stdClass();
    }
    
    /**
     * Renderiza a View
     * @param string $view
     * @param string $layout
     * @return void
     */
    protected function render(string $view, string $layout = 'layout'): void
    {
        $this->view->page = $view;
        
        if(file_exists(__DIR__.'/../../../App/Views/'.$layout.'.php')){
            require_once __DIR__.'/../../../App/Views/'.$layout.'.php';
        }else{
            $this->content();
        }
    }
    
    
    /**
     * Renderiza a conteudo da View com os dados
     * @return void
     */
    protected function content(): void
    {
        $classAtual = get_class($this);
        
        $classAtual = str_replace('App\\Controllers\\',"", $classAtual);
        
        $classAtual = strtolower(str_replace('Controller', '', $classAtual));
        
        require_once __DIR__.'/../../../App/Views/'.$classAtual.'/'.$this->view->page.'.php';
        
    }
    
}
