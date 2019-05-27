<?php

setlocale (LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese", "pt_BR.iso-8859-1");

spl_autoload_register(function ($nomeClasse) {

    $nomeArquivo = "class" . DIRECTORY_SEPARATOR . $nomeClasse . ".php";

	if (file_exists($nomeArquivo)) {

		require_once($nomeArquivo);

	}

}

);


?>