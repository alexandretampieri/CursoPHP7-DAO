<?php

require_once("config.php");

$listaUsuarios = Usuario::obtemLista();

echo json_encode($listaUsuarios);

?>