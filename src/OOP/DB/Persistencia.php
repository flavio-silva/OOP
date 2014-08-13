<?php

namespace OOP\DB;

class Persistencia 
{
    /**
     *
     * @var \PDO
     */
    private $db;
    
    public function __construct(\PDO $db) 
    {
        $this->db = $db;
    }
}
