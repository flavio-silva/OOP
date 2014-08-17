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

    public function flush() 
    {
        $sql = <<<EOD
'insert into fisica values 
(
    :id,:nome,:cpf,:sexo,:nascimento,:telefone:,:endereco,:cep,:bairo,:cidade,:estado, null
)
EOD;
        $stmt = $this->db->prepare($sql);
        
        /*@var $fisica \OOP\Cliente\Types\Fisica */
        foreach ($this->fisica as $fisica) 
        {
            $stmt->bindValue(':id',$fisica->getId());
            $stmt->bindValue(':nome',$fisica->getId());
            $stmt->bindValue(':cpf',$fisica->getId());
            $stmt->bindValue(':sexo',$fisica->getId());
            $stmt->bindValue(':nascimento',$fisica->getId());
            $stmt->bindValue(':telefone',$fisica->getId());
            $stmt->bindValue(':endereco',$fisica->getId());
            $stmt->bindValue(':cep',$fisica->getId());
            $stmt->bindValue(':bairro',$fisica->getId());
            $stmt->bindValue(':cidade',$fisica->getId());
            $stmt->bindValue(':estado',$fisica->getId());
        }
    }

}
