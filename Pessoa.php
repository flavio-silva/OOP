<?php

class Pessoa 
{
    public $nome;
    public $idade;
    
    public function correr() 
    {
        echo $this->nome . ' correu!';
    }
}

$pessoa1 = new Pessoa();
$pessoa1->nome = 'Flávio';
$pessoa1->idade = 26;

$pessoa2 = new Pessoa();
$pessoa2->nome = 'Maria';
$pessoa2->idade = 20;

echo $pessoa1->correr();
