<?php

class Juridica extends Pessoa
{
    private $cnpj;

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
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