<?php

namespace OOP\Cliente;

use OOP\Cliente\Types\Fisica;
use OOP\Cliente\Types\Juridica;

class ArrayCliente 
{
    /**
     * @var Types\Fisica
     */
    private $fisica;
    /**     
     * @var Types\Juridica
     */
    private $juridica;
    private $clientes = array();

    public function __construct(Fisica $fisica, Juridica $jurica) 
    {
        $this->fisica = $fisica;
        $this->juridica = $jurica;
    }
    
    private function populaFisica($filename)
    {
        if(is_file($filename) && is_readable($filename)) {
            $file = file($filename);            
            foreach ($file as $cliente) {                
                $cliente = explode("\t", $cliente);                
                $this->fisica->setId($cliente[0]);
                $this->fisica->setNome($cliente[1]);
                $this->fisica->setCpf($cliente[2]);
                $this->fisica->setSexo($cliente[3]);
                $this->fisica->setTelefone($cliente[4]);
                $this->fisica->setEndereco($cliente[5]);
                $this->fisica->setCep($cliente[6]);
                $this->fisica->setBairro($cliente[7]);
                $this->fisica->setCidade($cliente[8]);
                $this->fisica->setEstado($cliente[9]);
                $this->fisica->setDataNascimento($cliente[10]);
                $id = $this->fisica->getId();
                $this->clientes[$id] = clone $this->fisica;                
            }
            return true;
        }
        return false;
    }
    
    private function populaJuridica($filename) {
        if(is_file($filename) && is_readable($filename)) {
            $file = file($filename);
            foreach ($file as $cliente) {
                $cliente = explode("\t", $cliente);
                $this->juridica->setId($cliente[0]);
                $this->juridica->setNome($cliente[1]);
                $this->juridica->setCnpj($cliente[2]);                
                $this->juridica->setTelefone($cliente[3]);
                $this->juridica->setEndereco($cliente[4]);
                $this->juridica->setCep($cliente[5]);
                $this->juridica->setBairro($cliente[6]);
                $this->juridica->setCidade($cliente[7]);
                $this->juridica->setEstado($cliente[8]);
                
                $id = $this->juridica->getId();
                $this->clientes[$id] = clone $this->juridica;                
            }
            return true;
        }
        return false;
    }
    
    public function getClientes($fileNameFisica, $fileNameJuridica)
    {
        if($this->populaFisica($fileNameFisica) && $this->populaJuridica($fileNameJuridica)) {
            return $this->clientes;
        }
    }
}