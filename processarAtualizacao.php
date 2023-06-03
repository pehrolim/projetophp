<?php
require_once "CadastroContaCorrente.php";

$cadastroContaCorrente = new CadastroContaCorrente(); 

$cadastroContaCorrente->atualizar($_POST['cliente'], $_POST['numero_conta'], $_POST['saldo'], $_POST['taxa_manutencao']);

?>