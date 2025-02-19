<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{

	protected function initRoutes()
	{

		$routes['index'] = array(
			'route' => '/',
			'controller' => 'AppController',
			'action' => 'index'
		);

		$routes['cadastrar_time'] = array(
			'route' => 'cadastrar_time',
			'controller' => 'AppController',
			'action' => 'cadastrarTime'
		);

		$this->setRoutes($routes);
	}

}

?>