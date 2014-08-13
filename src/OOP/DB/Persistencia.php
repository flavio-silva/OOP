<?php

namespace OOP\DB;

use OOP\Cliente\Pessoa;
use OOP\Cliente\Types\Fisica;
use OOP\Cliente\Types\Juridica;

class Persistencia 
{
    /**
     *
     * @var \PDO
     */
    private $db;
    
    private $fisica = array();
    private $juridica = array();
    
    public function __construct(\PDO $db) 
    {
        $this->db = $db;
    }
    
    public function persist(Pessoa $cliente) 
    {
        if($cliente instanceof Fisica) {
            $this->fisica = $cliente;
        } elseif($cliente instanceof Juridica) {
            $this->juridica = $cliente;
        }
    }
    
    public function flush()
    {
        
    }
}
