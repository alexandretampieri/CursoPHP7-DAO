<form>

<label>Identificador do usuário:</label>
<input type="number" name="idUsuario" min="1" max="20" value="1">

<br/> <br/>

<label>Usuário:</label> 
<input type="text" name="deslogin" size="40" maxlength="20" value="">

<br/> <br/>

<label>Senha:</label> 
<input type="text" name="dessenha" size="20" maxlength="10" value="">

<br/> <br/>

<input type="submit" name="Ok" value="Alterar">

<br/> <br/>

</form>


<?php

require_once("config.php");

if (isset($_GET) && count($_GET) > 0) {

    $id = $_GET["idUsuario"];

	$aluno = new Usuario();

	if ($aluno->carregaPeloId($id)) {

	    $login = $_GET["deslogin"];

    	$senha = $_GET["dessenha"];

		$aluno->alterarUsuario($login, $senha);

		echo $aluno;

	}

	else {

		echo "Identificador do usuário " . $id . " não cadastrado!";

	}

}

?>