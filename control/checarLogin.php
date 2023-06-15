<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/mkrl/modelo/dao/UsuarioDAO.php";
$daoUsuario = UsuarioDAO::getInstance();
$sql = " where email = :email and senha =:senha";
$arrayDeParametros = array(":email",":senha");
$arrayDeValores = array($_POST['email'], md5($_POST['senha']));
print_r($_POST);
$lista=$daoUsuario->listWhere($sql,$arrayDeParametros,$arrayDeValores);
print_r($lista);
if(count($lista)>0){
    session_start();
    $_SESSION['idUsuarioLogado']=$lista[0]->getId();
     header("location: ../cadastrarUsuario.php"); 
}

?>