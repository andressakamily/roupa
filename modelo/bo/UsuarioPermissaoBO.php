<?php
class UsuarioPermissaoBO {
     static function usuarioPossuiPermissao($idUsuario,$descricaoPermissao){
        require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/dao/UsuarioPermissaoDAO.php';
        $sql = " where idUsuario = :idUsuarioLogado and idPermissao in (select id from permissao where nome = :descricaoDaPermissao)";
        $arrayDeParametros = array(":idUsuarioLogado", ":descricaoDaPermissao");
        $arrayDeValores = array($idUsuario, $descricaoPermissao);
        $lista = UsuarioPermissaoDAO::getInstance()->listWhere
                ($sql, $arrayDeParametros, $arrayDeValores);
        return count($lista)>0;
    }
    
      static function pegarTodasPermissoesDoUsuario($idUsuario){
        require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/dao/UsuarioPermissaoDAO.php';
        $sql = " where idUsuario = :idUsuario ";
        $arrayDeParametros = array ("idUsuario");
        $arrayDeValores = array($idUsuario);
        $lista = UsuarioPermissaoDAO::getInstance()->listWhere
                ($sql, $arrayDeParametros, $arrayDeValores);
        return$lista;
    }
}

