<?php
namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action
{
    public function timeline()
    {
        $this->validaAutenticacao();
        #RECUPERAÇÃO DOS TWEETS
        $tweet = Container::getModel('Tweet');
        $tweet->__set('id_usuario', $_SESSION['id']);

        $tweets = $tweet->getAll();
        $this->view->tweets = $tweets;
        $this->render('timeline');
    }
    public function tweet()
    {
        $this->validaAutenticacao();
        $tweet = Container::getModel('Tweet');
        $tweet->__set('tweet', $_POST['tweet']);
        $tweet->__set('id_usuario', $_SESSION['id']);

        $tweet->salvar();
        header('location: /timeline');
    }
    public function validaAutenticacao()
    {
        session_start();
        if ((!isset($_SESSION['id']) || empty($_SESSION['id'])) || (!isset($_SESSION['nome']) || empty($_SESSION['nome']))) {
            header('location: /?login=erro');
        }
    }
    public function quemSeguir()
    {
        $this->validaAutenticacao();
        $pesquisarPor = isset($_GET['pesquisarPor']) ? $_GET['pesquisarPor'] : '';

        if (!empty($pesquisarPor)) {
            // INSTANCIANDO O MODELO USER
            $usuario = Container::getModel('Usuario');
            $usuario->__set('nome', $pesquisarPor);
            $usuario->__set('id', $_SESSION['id']);
            $usuarios = $usuario->getAll();
        } else {
            $usuarios = []; // Garante que $usuarios sempre tenha um valor
        }

        $this->view->usuarios = $usuarios;
        $this->render('quemSeguir');
    }

    public function acao()
    {
        $this->validaAutenticacao();
        #ACÇÃO
        $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
        $id_usuario_seguindo = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';

        $usuario = Container::getModel('usuario');
        $usuario->__set('id', $_SESSION['id']);

        if ($acao == 'seguir') {
            $usuario->seguirUsuario($id_usuario_seguindo);
        } else if ($acao == 'deixar_seguir') {
            $usuario->deixarSeguirUsuario($id_usuario_seguindo);
        }
        header('location: /quem_seguir');
        #ID_USUARIO
    }
}