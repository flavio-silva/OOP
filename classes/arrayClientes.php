<?php
require_once __DIR__ . '/ClassificacaoInterface.php';
require_once __DIR__ . '/Pessoa.php';
require_once __DIR__ . '/Fisica.php';
require_once __DIR__ . '/Juridica.php';
$file = file(__DIR__ . '/../fisica.txt');

$clientes = array();
foreach($file as $cliente) {
    $cliente = explode("\t", $cliente);
    $fisica = new Fisica();
    $fisica->setId($cliente[0]);
    $fisica->setNome($cliente[1]);
    $fisica->setCpf($cliente[2]);
    $fisica->setSexo($cliente[3]);
    $fisica->setTelefone($cliente[4]);
    $fisica->setEndereco($cliente[5]);
    $fisica->setCep($cliente[6]);
    $fisica->setBairro($cliente[7]);
    $fisica->setCidade($cliente[8]);
    $fisica->setEstado($cliente[9]);
    $fisica->setDataNascimento($cliente[10]);
    $id = $fisica->getId();
    $clientes[$id] = $fisica;
}

$file = file(__DIR__ . '/../juridica.txt');

foreach($file as $cliente) {
    $cliente = explode("\t", $cliente);
    $juridica = new Juridica();
    $juridica->setId($cliente[0]);
    $juridica->setNome($cliente[1]);
    $juridica->setCnpj($cliente[2]);
    $juridica->setTelefone($cliente[3]);
    $juridica->setEndereco($cliente[4]);
    $juridica->setCep($cliente[5]);
    $juridica->setBairro($cliente[6]);
    $juridica->setCidade($cliente[7]);
    $juridica->setEstado($cliente[8]);
    $id = $juridica->getId();
    $clientes[$id] = $juridica;
}
