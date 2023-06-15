<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/atvphp1/projeto/modelo/vo/Cliente.php';
$obj = new Cliente();
$obj->setNome($_POST['nome']);
$obj->setNome($_POST['email']);
$obj->setNome($_POST['senha']);
