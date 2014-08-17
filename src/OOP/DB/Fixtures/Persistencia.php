<?php

namespace OOP\DB;

use OOP\Cliente\Pessoa;
use OOP\Cliente\Types\Fisica;
use OOP\Cliente\Types\Juridica;

class Persistencia {

    /**
     *
     * @var \PDO
     */
    private $db;
    private $fisica = array();
    private $juridica = array();

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function persist(Pessoa $cliente) {
        if ($cliente instanceof Fisica) {
            $this->fisica[] = $cliente;
        } elseif ($cliente instanceof Juridica) {
            $this->juridica[] = $cliente;
        }
    }

    private function flushFisica() 
    {
        $sql = <<<EOD
            'insert into fisica values 
            (
                :id,
                :nome,
                :cpf,
                :sexo,
                :nascimento,
                :telefone,
                :endereco,
                :cep,
                :bairo,
                :cidade,
                :estado,
                null
            )
EOD;
        $stmt = $this->db->prepare($sql);
        
        /*@var $fisica \OOP\Cliente\Types\Fisica */
        foreach ($this->fisica as $fisica) 
        {
            $stmt->bindValue(':id',$fisica->getId());
            $stmt->bindValue(':nome',$fisica->getNome());
            $stmt->bindValue(':cpf',$fisica->getCpf());
            $stmt->bindValue(':sexo',$fisica->getSexo());
            $stmt->bindValue(':nascimento',$fisica->getDataNascimento());
            $stmt->bindValue(':telefone',$fisica->getTelefone());
            $stmt->bindValue(':endereco',$fisica->getEndereco());
            $stmt->bindValue(':cep',$fisica->getCep());
            $stmt->bindValue(':bairro',$fisica->getBairro());
            $stmt->bindValue(':cidade',$fisica->getCidade());
            $stmt->bindValue(':estado',$fisica->getEstado());
            $stmt->execute();
        }
    }
    
    private function flushJuridica() 
    {
        $sql = <<<EOD
            'insert into fisica values 
            (
                :id,
                :nome,
                :cnpj,
                :telefone,
                :endereco,
                :cep,
                :bairo,
                :cidade,
                :estado,
                null
            )
EOD;
        $stmt = $this->db->prepare($sql);
        
        /*@var $fisica \OOP\Cliente\Types\Fisica */
        foreach ($this->juridica as $juridica) 
        {
            $stmt->bindValue(':id',$juridica->getId());
            $stmt->bindValue(':nome',$juridica->getNome());
            $stmt->bindValue(':cpf',$juridica->getCpf());            
            $stmt->bindValue(':telefone',$juridica->getTelefone());
            $stmt->bindValue(':endereco',$juridica->getEndereco());
            $stmt->bindValue(':cep',$juridica->getCep());
            $stmt->bindValue(':bairro',$juridica->getBairro());
            $stmt->bindValue(':cidade',$juridica->getCidade());
            $stmt->bindValue(':estado',$juridica->getEstado());
            $stmt->execute();
        }
    }
    
    public function flush() 
    {
        $this->flushFisica();
        $this->flushJuridica();
    }

}
