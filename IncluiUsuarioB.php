<?php

require_once("config.php");

$aluno = new Usuario();

$aluno->setDesLogin("aluno01");

$aluno->setDesSenha("@luno01");

$aluno->incluirUsuario();

echo $aluno;

?>