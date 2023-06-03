<?php

namespace Classes;

abstract class Conta {

    protected $numeroConta;
    protected $saldo;
    protected $cliente;

    public function __construct($cliente, $numeroConta, $saldoInicial) {
        $this->cliente = $cliente;
        $this->numeroConta = $numeroConta;
        $this->saldo = $saldoInicial;
    }

    public function depositar($valor) {
        $this->saldo += $valor;
    }

    public function sacar($valor) {
        if ($valor <= $this->saldo) {
            $this->saldo -= $valor;
        } else {
            echo "Saldo insuficiente.";
        }
    }

    abstract public function calcularTarifa();

    /**
     * Get the value of numeroConta
     */
    public function getNumeroConta()
    {
        return $this->numeroConta;
    }

    /**
     * Set the value of numeroConta
     */
    public function setNumeroConta($numeroConta): self
    {
        $this->numeroConta = $numeroConta;

        return $this;
    }

    /**
     * Get the value of saldo
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set the value of saldo
     */
    public function setSaldo($saldo): self
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get the value of cliente
     */ 
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set the value of cliente
     *
     * @return  self
     */ 
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }
}

?>