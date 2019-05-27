<form>

<label>Usuário:</label> 
<input type="text" name="deslogin" size="40" maxlength="20" value="">

<br/> <br/>

<label>Senha:</label> 
<input type="text" name="dessenha" size="20" maxlength="10" value="">

<br/> <br/>

<input type="submit" name="Ok" value="Incluir">

<br/> <br/>

</form>


<?php

require_once("config.php");

if (isset($_GET) && count($_GET) > 0) {

    $login = $_GET["deslogin"];

    $senha = $_GET["dessenha"];

	$aluno = new Usuario();

	$aluno->setDesLogin($login);

	$aluno->setDesSenha($senha);

	$aluno->incluirUsuario();

	echo $aluno;

}

?>