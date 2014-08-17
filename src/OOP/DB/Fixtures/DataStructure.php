<?php

namespace OOP\Db\Fixtures;

class DataStructure 
{
    /**     
     * @var \PDO 
     */
    private $db;
    
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }
    
    public function dropTableFisica() 
    {
        $this->db->query('drop table if exists fisica');
    }
    
    public function createTableFisica() 
    {
        $sql = <<<EOD
        create table fisica (
            id int auto_increment primary key,
            nome varchar(255) not null,
            cpf char(14) not null,
            sexo enum('F', 'M') not null,
            nascimento date not null,
            telefone varchar(15) not null,
            endereco varchar(255) not null,
            cep char(9) not null,
            bairro varchar(30) not null,
            cidade varchar(30) not null,
            estado char(2) not null,
            estrelas tinyint
        )
EOD;
        $this->db->query($sql);
    }
    
    public function dropTableJuridica() 
    {
        $this->db->query('drop table if exists juridica');
    }
    
    public function createTableJuridica() 
    {
        $sql = <<<EOD
        create table juridica (
            id int auto_increment primary key,
            nome varchar(255) not null,
            cnpj char(18) not null,	
            telefone varchar(15) not null,
            endereco varchar(255) not null,
            cep char(9) not null,
            bairro varchar(30) not null,
            cidade varchar(30) not null,
            estado char(2) not null,
            estrelas tinyint
        )
EOD;
        $this->db->query($sql);
    }    
}