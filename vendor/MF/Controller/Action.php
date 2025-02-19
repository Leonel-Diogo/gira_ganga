<?php
namespace MF\Controller;

abstract class Action
{
    protected $view;

    public function __construct()
    {
        $this->view = new \stdClass();
    }

    protected function render($view, $layout)
    {
        // Renderiza o layout
        $this->view->page = $view;

        if (file_exists("../app/Views/" . $layout . ".phtml")) {
            require_once "../app/Views/" . $layout . ".phtml";
            // Certifique-se de que este arquivo exista
        } else {
            $this->content();
        }

    }

    protected function content()
    {
        // Renderiza a view solicitada pelo controller
        $classAtual = get_class($this);
        $classAtual = str_replace('App\\Controllers\\', '', $classAtual);
        $classAtual = strtolower(str_replace('Controller', '', $classAtual));

        // Verifica se o arquivo existe e renderiza a view correspondente
        require_once "../app/Views/" . $classAtual . "/" . $this->view->page . ".phtml";
    }
}
?>