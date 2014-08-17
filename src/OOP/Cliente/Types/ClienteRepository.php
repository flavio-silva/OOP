<?php

namespace OOP\Cliente\Types;
use PDO;

class ClienteRepository 
{
    /**     
     * @var PDO 
     */
    private $db;

    public function __construct(PDO $db) 
    {
        $this->db = $db;
    }
    
    public function loadFisica()
    {
        $result = $this->db->query('select * from fisica');
        $results = array();
        if($result) {
            while($row = $result->fetchObject('\OOP\Cliente\Types\Fisica')) {
                $results[] = $row;
            }
            return $results;
        }
    }
    
    public function loadJuridica()
    {
        $result = $this->db->query('select * from juridica');
        $results = array();
        if($result) {
            while($row = $result->fetchObject('\OOP\Cliente\Types\Juridica')) {
                $results[] = $row;
            }
            return $results;
        }
    }
}