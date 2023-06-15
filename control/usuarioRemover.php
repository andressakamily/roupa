<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/dao/UsuarioDAO.php';
UsuarioDAO::getInstance()->delete($_GET['id']);
header("location: ../listarUsuario.php"); 