<?php
require_once "CadastroContaCorrente.php";

$cadastro = new CadastroContaCorrente();

$dados = $cadastro->buscar($_GET['numero_conta']);

if ($dados) {
    echo "
    <table border=2>
        <tr>
            <td><b>Cliente</b></td>
            <td><b>Numero da Conta</b></td>
            <td><b>Saldo</b></td>
            <td><b>Taxa de Manutencao</b></td>
        </tr>
        <tr>
            <td>{$dados['cliente']}</td>
            <td>{$dados['numero_conta']}</td>
            <td>{$dados['saldo']}</td>
            <td>{$dados['taxa_manutencao']}</td>
        </tr>
    </table>";
    echo '<a href="index.html"><button>Voltar</button></a>';
} else {
    echo "Nenhum dado encontrado.";
;        }


?>