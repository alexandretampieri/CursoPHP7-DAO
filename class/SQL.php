<?php

class SQL extends PDO {

	private $conexaoBanco;

	public function __construct() {

		$this->conexaoBanco = new PDO("mysql:dbname=dbphp7;host=localhost", "root", "root");

	}

	private function setParametros($comando, $parametros = array()) {

		foreach($parametros as $chave => $valor) {

			$this->setParametro($comando, $chave, $valor);
		}

	}

	private function setParametro($comando, $chave, $valor) {

		$comando->bindParam($chave, $valor);

	}

	public function query($comandoSQL, $parametros = array()) {

		$comando = $this->conexaoBanco->prepare($comandoSQL);

		$this->setParametros($comando, $parametros);

		$comando->execute();

		return $comando;

	}

	public function select($comandoSQL, $parametros = array()):array {

		$comando = $this->query($comandoSQL, $parametros);

		return $comando->fetchAll(PDO::FETCH_ASSOC);

	}

}

?>