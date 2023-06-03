<?php

require_once "autoload.php";

use Classes\ContaCorrente;
use Interfaces\ICadastroConta;


class CadastroContaCorrente implements ICadastroConta {
    private $servidor;

    public function __construct() {
        $this->servidor = new PDO('mysql:host=localhost:3306;dbname=conta', "root", "");
    }

    public function cadastrar($cliente, $numeroConta, $saldo, $tarifa) {
        $consulta = $this->servidor->prepare("INSERT INTO conta_corrente (cliente, numero_conta, saldo, taxa_manutencao) VALUES (?, ?, ?, ?)");
        $consulta->bindParam(1, $cliente);
        $consulta->bindParam(2, $numeroConta);
        $consulta->bindParam(3, $saldo);
        $consulta->bindParam(4, $tarifa);
        $consulta->execute();

        $this->listarContas();
    }

    public function atualizar($cliente, $numeroConta, $saldo, $tarifa) {
        $consulta = $this->servidor->prepare("UPDATE conta_corrente SET cliente = ?, numero_conta = ?, saldo = ? WHERE taxa_manutencao = ?");
        $consulta->bindParam(1, $cliente);
        $consulta->bindParam(2, $numeroConta);
        $consulta->bindParam(3, $saldo);
        $consulta->bindParam(4, $tarifa);
        $consulta->execute();
        $this->listarContas();
    }

    public function buscar($numeroConta) {
        $consulta = $this->servidor->prepare("SELECT * FROM conta_corrente WHERE numero_conta = ?");
        $consulta->bindParam(1, $numeroConta);
        $consulta->execute();
        $dados = $consulta->fetch(PDO::FETCH_ASSOC);
        return $dados;
        }
    public function remover($numeroConta) {
        $consulta = $this->servidor->prepare("DELETE FROM conta_corrente WHERE numero_conta = ?");
        $consulta->bindParam(1, $numeroConta);
        $consulta->execute();
        $this->listarContas();
    }

    public function listarContas() {
        $tabela = $this->servidor->query("SELECT * FROM conta_corrente");

        if ($tabela){
            echo "
            <table border=2>
                <tr>
                    <td><b>Cliente</b> </td>
                    <td><b>Numero</b> </td>
                    <td><b>Saldo</b></td>
                    <td><b>Taxa de Manutencao</b></td>
                </tr>
        ";
            foreach($tabela as $linha){
                echo "
                    <tr>
                        <td>{$linha['cliente']} </td>
                        <td>{$linha['numero_conta']}</td>
                        <td>{$linha['saldo']}</td>
                        <td>{$linha['taxa_manutencao']}</td>
                    </tr>
            ";
            }
            echo "</table>";
            echo '<a href="index.html"><button>Voltar</button></a>';
        }
    }    
}
