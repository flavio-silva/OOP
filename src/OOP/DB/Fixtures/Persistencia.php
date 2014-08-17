<?php

namespace OOP\Db\Fixtures;

use OOP\Cliente\Pessoa;
use OOP\Cliente\Types\Fisica;
use OOP\Cliente\Types\Juridica;
use PDO;

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
            insert into fisica values 
            (
                :id,
                :nome,
                :cpf,
                :sexo,
                :nascimento,
                :telefone,
                :endereco,
                :cep,
                :bairro,
                :cidade,
                :estado,
                null
            )
EOD;
        $stmt = $this->db->prepare($sql);
        
        /*@var $fisica \OOP\Cliente\Types\Fisica */
        foreach ($this->fisica as $fisica) 
        {
            $stmt->bindValue(':id',$fisica->getId(), PDO::PARAM_INT);
            $stmt->bindValue(':nome',$fisica->getNome(),PDO::PARAM_STR);
            $stmt->bindValue(':cpf',$fisica->getCpf(),PDO::PARAM_STR);
            $stmt->bindValue(':sexo',$fisica->getSexo(),PDO::PARAM_STR);
            $stmt->bindValue(':nascimento',$fisica->getDataNascimento(),PDO::PARAM_STR);
            $stmt->bindValue(':telefone',$fisica->getTelefone(),PDO::PARAM_STR);
            $stmt->bindValue(':endereco',$fisica->getEndereco(),PDO::PARAM_STR);
            $stmt->bindValue(':cep',$fisica->getCep(),PDO::PARAM_STR);
            $stmt->bindValue(':bairro',$fisica->getBairro(),PDO::PARAM_STR);
            $stmt->bindValue(':cidade',$fisica->getCidade(),PDO::PARAM_STR);
            $stmt->bindValue(':estado',$fisica->getEstado(),PDO::PARAM_STR);
            $stmt->execute();
        }
    }
    
    private function flushJuridica() 
    {
        $sql = <<<EOD
            insert into juridica values 
            (
                :id,
                :nome,
                :cnpj,
                :telefone,
                :endereco,
                :cep,
                :bairro,
                :cidade,
                :estado,
                null
            )
EOD;
        $stmt = $this->db->prepare($sql);
        
        /*@var $juridica \OOP\Cliente\Types\Juridica */
        foreach ($this->juridica as $juridica) 
        {
            $stmt->bindValue(':id',$juridica->getId(),PDO::PARAM_INT);
            $stmt->bindValue(':nome',$juridica->getNome(),PDO::PARAM_STR);
            $stmt->bindValue(':cnpj',$juridica->getCnpj(),PDO::PARAM_STR);
            $stmt->bindValue(':telefone',$juridica->getTelefone(),PDO::PARAM_STR);
            $stmt->bindValue(':endereco',$juridica->getEndereco(),PDO::PARAM_STR);
            $stmt->bindValue(':cep',$juridica->getCep(),PDO::PARAM_STR);
            $stmt->bindValue(':bairro',$juridica->getBairro(),PDO::PARAM_STR);
            $stmt->bindValue(':cidade',$juridica->getCidade(),PDO::PARAM_STR);
            $stmt->bindValue(':estado',$juridica->getEstado(),PDO::PARAM_STR);
            $stmt->execute();
        }
    }
    
    public function flush() 
    {
        $this->flushFisica();
        $this->flushJuridica();
    }

}
