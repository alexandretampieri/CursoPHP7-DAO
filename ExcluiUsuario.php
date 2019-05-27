<form>

<label>Identificador do usuário:</label>
<input type="number" name="idUsuario" min="1" max="20" value="1">

<br/> <br/>

<input type="submit" name="Ok" value="Excluir">

<br/> <br/>

</form>


<?php

require_once("config.php");

if (isset($_GET) && count($_GET) > 0) {

    $id = $_GET["idUsuario"];

	$aluno = new Usuario();

	if ($aluno->carregaPeloId($id)) {

		$aluno->excluirUsuario();

		echo $aluno;

	}

	else {

		echo "Identificador do usuário " . $id . " não cadastrado!";

	}

}

?>