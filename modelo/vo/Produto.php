<?php
class Produto {
    private $id;
    private $tipo;
    private $tamanho;
    private $cor;
    private $quantidade;
    private $preco;
    private $estoqueDoProduto;
    
    function getEstoqueDoProduto() {
        return $this->estoqueDoProduto;
    }

    function setEstoqueDoProduto($estoqueDoProduto) {
        $this->estoqueDoProduto = $estoqueDoProduto;
    }

        function getPreco() {
        return $this->preco;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

        function getId() {
        return $this->id;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getTamanho() {
        return $this->tamanho;
    }

    function getCor() {
        return $this->cor;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
    }

    function setCor($cor) {
        $this->cor = $cor;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function toString() {
        return $this->roupa;
    }
    
}
?>
