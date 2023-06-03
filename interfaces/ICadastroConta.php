<?php

namespace Interfaces;

interface ICadastroConta
{
    public function cadastrar($cliente, $numeroConta, $saldo, $tarifa);
    public function atualizar($cliente, $numeroConta, $saldo, $tarifa);
    public function buscar($numeroConta);
    public function remover($numeroConta);
    public function listarContas();
}


?>