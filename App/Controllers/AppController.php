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

        $this->render('index');
    }
    public function cadastrarTime()
    {
        print_r($_POST);
        $times = Container::getModel('Time');

        $times->__set("nome", $_POST['nome']);
        $times->__set("capitao", $_POST['capitao']);
        $times->__set("qtd_jogadores", $_POST['qtd_jogadores']);
        $times->__set("torneios_participando", $_POST['torneios_participando']);
        $times->__set("status_atual", $_POST['status_atual']);

        $times->salvar();
        print_r($times);


    }


}