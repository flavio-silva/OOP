<?php

class Cliente 
{
    private $nome;
    private $rg;
    private $cpf;
    private $logradouro;
    private $cep;
    private $cidade;
    private $estado;
    
    public function getNome() {
        return $this->nome;
    }

    public function getRg() {
        return $this->rg;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getLogradouro() {
        return $this->logradouro;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setRg($rg) {
        $this->rg = $rg;
        return $this;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
        return $this;
    }

    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
        return $this;
    }

    public function setCep($cep) {
        $this->cep = $cep;
        return $this;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
        return $this;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
        return $this;
    }
}
