<?php


namespace MF\Model;
use MF\Model\Container;

abstract class Model
{

	protected $db;

	public function __construct(\PDO $db)
	{
		$this->db = $db;
	}
}


?>