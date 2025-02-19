<?php
namespace MF\Init;
abstract class Bootstrap
{
    private $routes;
    #MÉTODO CONTRUTOR/CONSTRUINDO O OBJETO
    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }
    #MÉTODO GET
    public function getRoutes()
    {
        return $this->routes;
    }
    #MÉTODO SET
    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }
    #DEFINIÇÃO DE MÉTODO ABSTRATO
    abstract protected function initRoutes();
    #EXECUTANDO A ROTA
    protected function run($url)
    {
        foreach ($this->getRoutes() as $key => $route) {

            if ($url == $route['route']) {
                #CRIANDO NAMESPACE DINÂMICO
                $class = "App\\Controllers\\" . ucfirst($route['controller']);
                $controller = new $class;
                $action = $route['action'];
                $controller->$action();
            }
        }
    }
    #RECUPERANDO A URL EM QUE O USUÁRIO ESTÁ
    protected function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

}