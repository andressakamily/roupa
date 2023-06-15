<?php
class UsuarioPermissao {
    private $id;
    private $idUsuario;
    private $idPermissao;
    //utilizando lazyloading
    function getPermissao(){
         require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/dao/PermissaoDAO.php';         
         return PermissaoDAO::getInstance()->getById($this->idPermissao);
    }      
    
    function getId() {
        return $this->id;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getIdPermissao() {
        return $this->idPermissao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setIdPermissao($idPermissao) {
        $this->idPermissao = $idPermissao;
    }

  
}
