<?php

class Cliente
{
    public $id;
    public $nome;
    public $sexo;
    public $telefone;
    public $dataNascimento;
    public $endereco;
    public $cep;
    public $bairro;
    public $cidade;
    public $estado;
    
}

$clientes = file(__DIR__ . '/clientes.txt');

$arrayClientes = new ArrayObject();
for($i = 0; $i < sizeof($clientes); $i++) {
        $cliente = explode("\t",$clientes[$i]);

        $objCliente = new Cliente();
    $objCliente->id = $i;
        $objCliente->nome = $cliente[0];
        $objCliente->sexo = $cliente[1];
        $objCliente->telefone = $cliente[2];
        $objCliente->endereco = $cliente[3];
        $objCliente->cep = $cliente[4];
        $objCliente->bairro = $cliente[5];
        $objCliente->cidade = $cliente[6];
        $objCliente->estado = $cliente[7];
        $objCliente->dataNascimento = $cliente[8];

        $arrayClientes->offsetSet($i,$objCliente );
}