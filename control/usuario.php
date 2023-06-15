<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/vo/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/dao/UsuarioDAO.php';
$obj = new Usuario();
$obj->setNome($_POST['nome']);
$obj->setEmail($_POST['email']);
$obj->setSenha(md5($_POST['senha']));

$obj->setId($_POST['id']);
print_r($_POST);
if($obj->getId()!=0)
    UsuarioDAO::getInstance ()->update($obj);
else{
    //$idUsuarioQueAcabouDeSalvar UsuarioDAO::getInstance()->insert($obj);
    foreach ($_POST['permissao'] as $idPermissao){
        $usuarioPermissao = new UsuarioPermissao ();
        $usuarioPermissao->setIdPermissao($idPermissao);
        $usuarioPermissao->setIdPessoa($idUsuarioQueAcabouDeSalvar); //casa
        
        UsuarioPermissaoDAO::getInstance()->insert($obj);
    }
}
    
    
 //header("location: ../listarUsuario.php"); 
 ?>