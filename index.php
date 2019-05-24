<?php

require_once("config.php");

$comandoSQL = new SQL();

$usuarios = $comandoSQL->select("SELECT * from tb_usuarios order by deslogin");

echo json_encode($usuarios);

?>