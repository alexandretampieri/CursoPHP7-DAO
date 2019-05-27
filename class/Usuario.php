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


	public function carregaPeloId($id):bool {

		$comandoSQL = new SQL();

		$resultado = $comandoSQL->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID;", array(":ID"=>$id));

		if (count($resultado) > 0) {

			$coluna = $resultado[0];

			$this->setIdUsuario($coluna["idusuario"]);

			$this->setDesLogin($coluna["deslogin"]);

			$this->setDesSenha($coluna["dessenha"]);

			$this->setDtCadastro(new DateTime($coluna["dtcadastro"]));

			return true;

		}

		else {

			return false;
		}

	}



	public function validaUsuario($login, $senha) {

		$comandoSQL = new SQL();

		$resultado = $comandoSQL->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :SENHA;", array(
			":LOGIN"=>$login,
			":SENHA"=>$senha
		));

		if (count($resultado) > 0) {

			$coluna = $resultado[0];

			$this->setIdUsuario($coluna["idusuario"]);

			$this->setDesLogin($coluna["deslogin"]);

			$this->setDesSenha($coluna["dessenha"]);

			$this->setDtCadastro(new DateTime($coluna["dtcadastro"]));

		}

		else {

			throw new Exception("Login e/ou senha inválidos.");
		}

	}

	public static function obtemLista() {

		$comandoSQL = new SQL();

		return $comandoSQL->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");

    }


	public static function pesquisaLike($chave) {

		$comandoSQL = new SQL();

		return $comandoSQL->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :ARG ORDER BY deslogin;", array(
			":ARG"=>"%".$chave."%"
		));

    }


	public function __toString() {

		$json = json_encode(array(

			"Id Usuario"=>$this->getIdUsuario(),

			"Login"=>$this->getDesLogin(),

			"Senha"=>$this->getDesSenha(),

			"DataCadastro"=>$this->getDtCadastro()->format("d/m/Y, H:i:s"),

			JSON_UNESCAPED_UNICODE

		));

		return $json;

	}


}

?>