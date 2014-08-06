<?php

include_once __DIR__ . '/../layout/header.php';
include_once __DIR__ .'/../Cliente.php';

$clientes = file(__DIR__ . '/../clientes.csv');
$arrayClientes = array();
for($i = 0; $i < sizeof($clientes); $i++) {
    $cliente = explode(';',$clientes[$i]);
    
    $objCliente = new Cliente();
    $objCliente->nome = $cliente[0];
    $objCliente->sexo = $cliente[1];
    $objCliente->telefone = $cliente[2];
    $objCliente->endereco = $cliente[3];
    $objCliente->cep = $cliente[4];
    $objCliente->bairro = $cliente[5];
    $objCliente->cidade = $cliente[6];
    $objCliente->estado = $cliente[7];
    $objCliente->dataNascimento = $cliente[8];
    
    $arrayClientes[] = $objCliente;
}
var_dump($arrayClientes);
include_once __DIR__ . '/../layout/footer.php';