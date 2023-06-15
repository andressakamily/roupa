<?php
class caixa {
    private $id;
    private $valor;
    private $descricao;
    private $dataVencimento;
    private $dataPagamento;
    private $fluxo;
    private $tipo;
    
    function getDescricao() {
        return $this->descricao;
    }

    function getDataVencimento() {
        return $this->dataVencimento;
    }

    function getDataPagamento() {
        return $this->dataPagamento;
    }

    function getFluxo() {
        return $this->fluxo;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setDataVencimento($dataVencimento) {
        $this->dataVencimento = $dataVencimento;
    }

    function setDataPagamento($dataPagamento) {
        $this->dataPagamento = $dataPagamento;
    }

    function setFluxo($fluxo) {
        $this->fluxo = $fluxo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    function getValor() {
        return $this->valor;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

        function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
}
