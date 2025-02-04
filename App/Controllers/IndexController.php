<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action
{

	public function index()
	{
		$this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
		$this->render('index');
	}

	public function inscreverse()
	{
		$this->view->usuario = array(
			'nome' => '',
			'email' => '',
			'senha' => ''
		);
		$this->view->erroCadastro = false;
		$this->render('inscreverse');
	}
	public function registrar()
	{
		#RECEBER OS DADOS DO FORM
		$usuario = Container::getModel('Usuario');
		$usuario->__set('nome', $_POST['nome']);
		$usuario->__set('email', $_POST['email']);
		#CRIPTOGRAFIA DE SENHA COM MD5 DO PHP
		$usuario->__set('senha', md5($_POST['senha']));
		#VERIFICANDO SE OS CAMPOS FORAM PREENCHIDOS E SE O USUÁRIO EXISTE
		if ($usuario->validarCadastro() && count($usuario->getUsuarioEmail()) == 0) {
			#ADICIONANDO NA BD
			$usuario->salvar();
			#EM CASO DE SUCESSO NO CADASTRO
			$this->render('cadastro');

		} else {
			#EM CASO DE INSUCESSO NO CADASTRO
			$this->view->usuario = array(
				'nome' => $_POST['nome'],
				'email' => $_POST['email'],
				'senha' => $_POST['senha']
			);

			$this->view->erroCadastro = true;
			$this->render('inscreverse');
		}
	}

}


?>