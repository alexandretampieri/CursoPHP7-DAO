<form>

<label>Identificador do usuário:</label>
<input type="number" name="idUsuario" min="1" max="20" value="1">

<input type="submit" name="Ok" value="Confirmar">

<br> <br>

</form>


<?php

require_once("config.php");

/*

$comandoSQL = new SQL();

$usuarios = $comandoSQL->select("SELECT * from tb_usuarios order by deslogin");

echo json_encode($usuarios);

*/

//Carrega um usuário pelo idusuario

if (isset($_GET) && count($_GET) > 0) {

    $id = $_GET["idUsuario"];

    pesquisaUsuario($id);

}


function pesquisaUsuario($id) {

	$root = new Usuario();

	if ($root->carregaPeloId($id)) {

		echo $root;

	}

	else {

		echo "Identificador do usuário " . $id . " não cadastrado!";

	}

}

?>