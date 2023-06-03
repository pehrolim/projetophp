<?php
require_once "CadastroContaCorrente.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numeroConta = $_POST['numero_conta'];

    $cadastroConta = new CadastroContaCorrente();

    $dadosConta = $cadastroConta->buscar($numeroConta);

    if ($dadosConta) {
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Atualizar Conta</title>
        </head>
        <body>
            <h1>Atualizar Conta</h1>
            <form action="" method="post">
                <label>Número da Conta:</label>
                <input type="text" name="numero_conta" value="' . $dadosConta['numero_conta'] . '"><br>
                <label>Cliente:</label>
                <input type="text" name="cliente" value="' . $dadosConta['cliente'] . '"><br>
                <label>Saldo:</label>
                <input type="text" name="saldo" value="' . $dadosConta['saldo'] . '"><br>
                <label>Taxa de Manutenção:</label>
                <input type="text" name="taxa_manutencao" value="' . $dadosConta['taxa_manutencao'] . '"><br>
                <input type="submit" value="Atualizar">
            </form>
        </body>
        </html>';
    } else {
        echo "Nenhum dado encontrado para o número de conta fornecido.";
    }
} 

?>
