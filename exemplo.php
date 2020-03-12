<?php
require_once ('ContaBancaria.php');
require_once ('CaixaEletronico.php');

$conta1 = new ContaBancaria(1,20000);
$conta2 = new ContaBancaria(2,20000);

$caixa = new CaixaEletronico($conta1);

//saque
var_dump($caixa->saque(5000));
echo "<br>";

var_dump($caixa->saque(500));
echo "<br>";

var_dump($caixa->saque(500000));
echo "<br>";

var_dump($conta1->getSaldoConta());
echo "<br>";

//transferencia
var_dump($caixa->transferencia(500,$conta2));
echo "<br>";

var_dump($conta2->getSaldoConta());
echo "<br>";
//deposito
var_dump($caixa->deposito(50000));
echo "<br>";

var_dump($conta1->getSaldoConta());
echo "<br>";

?>