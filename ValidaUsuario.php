<form>

<label>Usuário:</label> 
<input type="text" name="deslogin" size="40" maxlength="20">

<br/> <br/>

<label>Senha:</label> 
<input type="text" name="dessenha" size="20" maxlength="10">

<br/> <br/>

<input type="submit" name="Ok" value="Confirmar">

<br/> <br/>

</form>


<?php

require_once("config.php");

if (isset($_GET) && count($_GET) > 0) {

    $login = $_GET["deslogin"];

    $senha = $_GET["dessenha"];

	$root = new Usuario();

	$root->validaUsuario($login, $senha);

	echo $root;

}

?>