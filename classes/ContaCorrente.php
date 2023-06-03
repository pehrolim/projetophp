<?php

namespace Classes;

class ContaCorrente extends Conta {
    private $taxaManutencao;

    public function __construct($cliente, $numeroConta, $saldoInicial, $taxaManutencao) {
        parent::__construct($cliente, $numeroConta, $saldoInicial);
        $this->taxaManutencao = $taxaManutencao;
    }

    public function calcularTarifa() {
        $this->saldo -= $this->taxaManutencao;
    }

    /**
     * Get the value of taxaManutencao
     */
    public function getTaxaManutencao()
    {
        return $this->taxaManutencao;
    }

    /**
     * Set the value of taxaManutencao
     */
    public function setTaxaManutencao($taxaManutencao): self
    {
        $this->taxaManutencao = $taxaManutencao;

        return $this;
    }
}


?>