<?php
namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action
{
    public function index()
    {
        #RECUPERAÇÃO DOS DADOS
        $times = Container::getModel('Time');
        $this->view->time = $times->getAll();
        $this->render('index');
    }
    public function cadastrarTime()
    {
        $times = Container::getModel('Time');

        $times->__set("nome", $_POST['nome']);
        $times->__set("capitao", $_POST['capitao']);
        $times->__set("qtd_jogadores", $_POST['qtd_jogadores']);
        $times->__set("torneios_participando", $_POST['torneios_participando']);
        $times->__set("status_atual", $_POST['status_atual']);

        if ($times->cadastrar()) {
            header("location: /?sucesso=Time cadastrado com sucesso!");
        } else {
            header("location: /?erro=Erro no cadastro!");
        }
    }
    public function removerTime()
    {
        $time = Container::getModel('Time');
        $time->__set("id_time", $_POST['id_time']);
        if (count($time->getById())) {
            if ($time->remover()) {
                header('Location: /?sucesso=Time Exlcuido Com Sucesso!');
            } else {
                header('Location: /?erro=Erro, Alguma Coisa Correu!');
            }
        } else {
            header('Location: /?erro=Este Time Não Existe!');
        }

    }


}