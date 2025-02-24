<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{

	protected function initRoutes()
	{

		#ROTA PARA LISTAGEM DE TIMES
		$routes['index'] = array(
			'route' => '/',
			'controller' => 'AppController',
			'action' => 'index'
		);
		#ROTA PARA CADASTRO DE TIMES
		$routes['cadastrar_time'] = array(
			'route' => '/cadastrar_time',
			'controller' => 'AppController',
			'action' => 'cadastrarTime'
		);

		#ROTA PARA REMOÇÃO DE TIMES
		$routes['remover_time'] = array(
			'route' => '/remover_time',
			'controller' => 'AppController',
			'action' => 'removerTime'
		);

		$this->setRoutes($routes);
	}

}

?>