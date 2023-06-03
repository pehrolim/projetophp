<?php

require_once "CadastroContaCorrente.php";


$cadastro = new CadastroContaCorrente();

$cadastro->cadastrar($_POST['cliente'], $_POST['numero_conta'], $_POST['saldo'], $_POST['taxa_manutencao']);


?>