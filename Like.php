<?php

require_once("config.php");

//Pesquisa login do usuário utilizando LIKE do SQL

$listaUsuarios = Usuario::pesquisaLike("al");

echo json_encode($listaUsuarios);

?>