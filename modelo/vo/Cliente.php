<?php
class Cliente {
    private $nome;
    private $cpf;
    private $logradouro;
    private $cidade;
    private $telefone;
    private $uf;
    private $email;
    private $id;
    
    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getLogradouro() {
        return $this->logradouro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getUf() {
        return $this->uf;
    }

    function getEmail() {
        return $this->email;
    }

    function getId() {
        return $this->id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setUf($uf) {
        $this->uf = $uf;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setId($id) {
        $this->id = $id;
    }


}
