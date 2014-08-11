<?php

namespace OOP\Cliente\Types;

use OOP\Cliente\Pessoa;

class Fisica extends Pessoa
{
    private $cpf;
    private $sexo;
    private $dataNascimento;

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }


    /**
     * @param mixed $dataNascimento
     */
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    /**
     * @return mixed
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    public function classifica($estrelas)
    {
        if(is_int($estrelas) && in_array($estrelas, array(1,2,3,4,5))) {
            $this->estrelas = $estrelas ;
            return true;
        }
        return false;
    }

} 