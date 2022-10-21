<?php

namespace WC\Init;

/**
 * Abstração da classe Router
 */
abstract class Bootstrap
{
    
    /**
     * Armazena as rotas do sistema
     * @var array|null
     */
    private ?array $routes;
    
    abstract protected function ConfigRoutes();
    
    public function __construct() 
    {
        $this->ConfigRoutes();
        $this->run($this->getUrl(), $this->getRequestMethod());
    }
    
     /**
     * Retorna as rotas
     * @return array
     */
    protected function getRoutes(): array
    {
        return $this->routes;
    }
    
    /**
     * Define as rotas
     * @param array $routes
     * @return void
     */
    protected function setRoutes(array $routes): void
    {
        $this->routes = $routes;
    }
    
    /**
     * Retorna a URL
     * @return string
     */
    protected function getUrl(): string
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
    
    /**
     * Retorna o método da requisição
     * GET | POST | PUTH | DELETE
     * @return string
     */
    protected function getRequestMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    
    /**
     * Executa a rota
     * @param string $url
     * @param string $requestMethod
     * @return void
     */
    protected function run(string $url, string $requestMethod): void
    {
        
        $url = strtolower(str_replace(URL_PREFIX, "", $url));
        
        foreach($this->getRoutes() as $key => $route){
            
            if($url == $route['route'] && $requestMethod == $route['request_method']){
            
                $class = "\\App\\Controllers\\".ucfirst($route['controller']);
                
                $controller = new $class();
                
                $action = $route['action'];
                
                $controller->$action();
                
            }
            
        }
        
    }
    
}