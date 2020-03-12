<?php

class ContaBancaria{
    private $tipoConta; //1 para corrente 2 para poupança
    private $saldoConta;

    public function __construct($tipoDaConta, $saldoInicial = 0)
    {
        $this->setTipoConta($tipoDaConta);
        $this->setSaldoConta($saldoInicial);
    }

    public function getTipoConta()
    {
        return $this->tipoConta;
    }

    public function setTipoConta($tipo)
    {
        $this->tipoConta = $tipo;
    }

    public function getSaldoConta()
    {
        return $this->saldoConta;
    }

    public function setSaldoConta($saldo)
    {
        $this->saldoConta = $saldo;
    }
}

?>