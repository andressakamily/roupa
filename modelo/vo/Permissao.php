<?php
class Permissao {
    private $id;
    private $nome;
    private $usuarioPermissao;
    function getUsuarioPermissao() {
        return $this->usuarioPermissao;
    }

    function setUsuarioPermissao($usuarioPermissao) {
        $this->usuarioPermissao = $usuarioPermissao;
    }

        function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }


}
