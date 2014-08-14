<?php
$config = parse_ini_file(__DIR__ . '/db.ini');
$pdo = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['username'], $config['passwd']);

$pdo->query('drop table if exists fisica');
$sql = <<<EOD
create table fisica (
    id int auto_increment primary key,
    nome varchar(255) not null,
    cpf char(11) not null,
    sexo enum('F', 'M') not null,
    nascimento date not null,
    telefone varchar(15) not null,
    endereco varchar(255) not null,
    cep char(8) not null,
    bairro varchar(30) not null,
    cidade varchar(30) not null,
    estado char(2) not null,
    estrelas tinyint
)
EOD;
$pdo->query($sql);

$pdo->query('drop table if exists juridica');
$sql = <<<EOD
create table juridica (
    id int auto_increment primary key,
    nome varchar(255) not null,
	cnpj char(14) not null,	
    telefone varchar(15) not null,
    endereco varchar(255) not null,
    cep char(8) not null,
    bairro varchar(30) not null,
    cidade varchar(30) not null,
    estado char(2) not null,
    estrelas tinyint
)    
EOD;
$pdo->query($sql);