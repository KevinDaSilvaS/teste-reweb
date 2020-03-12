<?php

class CaixaEletronico{

    private $taxaDeOperacao;
    private $limite;
    private $conta;

    public function __construct($contaCliente)
    {
        $this->conta = $contaCliente;

        $tipoConta = $this->conta->getTipoConta();

        $this->setLimite($tipoConta);
        $this->setTaxaDeOperacao($tipoConta);
    }

    public function saque($valor)
    {
        $valorTotalSaque = $valor + $this->taxaDeOperacao;

        if ($valorTotalSaque > $this->limite) {
            return "Erro:: Valor do saque maior que o minimo permitido,
            certifique-se que o valor a ser sacado esteja abaixo de: " . $this->limite;
        }

        if ($this->conta->getSaldoConta() < $valorTotalSaque) {
            return "Erro:: Saldo insuficiente";
        }

        $saldoRestante = $this->conta->getSaldoConta() - $valorTotalSaque;

        $this->conta->setSaldoConta($saldoRestante);
        
        return "Saque efetuado com sucesso.";

    }

    public function deposito($valor)
    {
        $saldoConta = $this->conta->getSaldoConta() + $valor;
        $this->conta->setSaldoConta($saldoConta);

        return "Deposito realizado com sucesso";
    }

    public function transferencia($valor,$destinatario)
    {
        if ($this->conta->getSaldoConta() < $valor) {
            return "Erro:: Saldo insuficiente";
        }

        $saldoRestante = $this->conta->getSaldoConta() - $valor;
        $this->conta->setSaldoConta($saldoRestante);

        $saldoDestinatario = $destinatario->getSaldoConta() + $valor;
        $destinatario->setSaldoConta($saldoDestinatario);

        return "Transferrencia Efetuada com sucesso";
    }

    private function setLimite($tipoConta)
    {
        if ($tipoConta == 1) {
           $this->limite = 600;

        }else{
           $this->limite = 1000;
        }
    }

    private function setTaxaDeOperacao($tipoConta)
    {
        if ($tipoConta == 1) {
            $this->taxaDeOperacao = 2.50;
 
        }else{
            $this->taxaDeOperacao = 0.80;
        }
    }

    public function getConta()
    {
        return $this->conta;
    }

    public function setConta($contaCliente)
    {
        $this->conta = $contaCliente;
    }

}
?>