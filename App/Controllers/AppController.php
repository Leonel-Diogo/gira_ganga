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

        #PAGINAÇÃO
        $total_registros_pagina = 5;#limite
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $deslocamento = ($pagina - 1) * $total_registros_pagina;

        #echo "<br><br><br> Página:  $pagina | Registros por página:  $total_registros_pagina | Deslocamento: $deslocamento";

        $tweets = $tweet->getPorPagina($total_registros_pagina, $deslocamento);
        $total_tweets = $tweet->getTotalRegistros();
        $this->view->total_de_paginas = ceil($total_tweets['total'] / $total_registros_pagina);

        #PÁGINA ATIVA
        $this->view->pagina_ativa = $pagina;


        $this->view->tweets = $tweets;

        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_SESSION['id']);

        $this->view->info_usuario = $usuario->getInfoUsuario();
        $this->view->total_tweets = $usuario->getTotalTweets();
        $this->view->total_seguindo = $usuario->getTotalSeguindo();
        $this->view->total_seguidores = $usuario->getTotalSeguidores();

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
    public function removerTweet()
    {
        $this->validaAutenticacao(); // Garante que o usuário está logado

        if (!isset($_GET['id_tweet']) || empty($_GET['id_tweet'])) {
            header('Location: /timeline?erro=invalid_id');
            exit;
        }

        $tweet = Container::getModel('Tweet');
        $tweet->__set('id_usuario', $_SESSION['id']); // Pega o usuário logado
        $tweet->removerTweet($_GET['id_tweet']); // Chama a função para excluir

        header('Location: /timeline'); // Redireciona para a timeline
        exit;
    }


}