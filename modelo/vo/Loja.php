<?php
class loja {
    private $cnpj;
    private $id;
    
    function getCnpj() {
        return $this->cnpj;
    }

    function getId() {
        return $this->id;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    function setId($id) {
        $this->id = $id;
    }


}
