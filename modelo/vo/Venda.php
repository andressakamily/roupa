<?php
class Venda {
    private $formaDePagamento;
    private $valorTotal;
    private $cliente;
    private $data;
    private $id;
    
    function getValorTotal() {
        return $this->valorTotal;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getData() {
        return $this->data;
    }

    function setValorTotal($valorTotal) {
        $this->valorTotal = $valorTotal;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setData($data) {
        $this->data = $data;
    }

        function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

        function getFormaDePagamento() {
        return $this->formaDePagamento;
    }

    function getValor() {
        return $this->valor;
    }

    function setFormaDePagamento($formaDePagamento) {
        $this->formaDePagamento = $formaDePagamento;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }
}
