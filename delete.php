<?php

require_once "CadastroContaCorrente.php";

$cadastro = new CadastroContaCorrente();

$cadastro->remover($_GET['numero_conta']);


?>