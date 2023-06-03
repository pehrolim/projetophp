<?php

namespace Classes;

class ContaPoupanca extends Conta {
    private $juros;

    public function __construct($cliente,$numeroConta, $saldoInicial, $juros) {
        parent::__construct($cliente, $numeroConta, $saldoInicial);
        $this->juros = $juros;
    }

    public function calcularTarifa() {
        $this->saldo *= (1 + $this->juros);
    }

    /**
     * Get the value of juros
     */
    public function getJuros()
    {
        return $this->juros;
    }

    /**
     * Set the value of juros
     */
    public function setJuros($juros): self
    {
        $this->juros = $juros;

        return $this;
    }
}

?>