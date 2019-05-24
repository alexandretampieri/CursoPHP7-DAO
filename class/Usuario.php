<?php

class Usuario {

	private $idusuario;

	private $deslogin;

	private $dessenha;

	private $dtcadastro;


	public function getIdUsuario() {

		return $this->idusuario;

	}


	public function setIdUsuario($valorIdUsuario) {

		$this->idusuario = $valorIdUsuario;

	}


	public function getDesLogin() {

		return $this->deslogin;

	}


	public function setDesLogin($valorDesLogin) {

		$this->deslogin = $valorDesLogin;

	}


	public function getDesSenha() {

		return $this->dessenha;

	}


	public function setDesSenha($valorDesSenha) {

		$this->dessenha = $valorDesSenha;

	}


	public function getDtCadastro() {

		return $this->dtcadastro;

	}


	public function setDtCadastro($valorDtCadastro) {

		$this->dtcadastro = $valorDtCadastro;

	}


	public function carregaPeloId($id) {

		$comandoSQL = new SQL();

		$resultado = $comandoSQL->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id));

		if (count($resultado) > 0) {

			$coluna = $resultado[0];

			$this->setIdUsuario($coluna["idusuario"]);

			$this->setDesLogin($coluna["deslogin"]);

			$this->setDesSenha($coluna["dessenha"]);

			$this->setDtCadastro(new DateTime($coluna["dtcadastro"]));

		}

	}


	public function __toString() {

var_dump($this->getDtCadastro());

		return json_encode(array(

			"Id Usuario"=>$this->getIdUsuario(),

			"Login"=>$this->getDesLogin(),

			"Senha"=>$this->getDesSenha(),

			"Data Cadastro"=>$this->getDtCadastro()->format("d-m-Y H:i:s")

		));

	}


}

?>