<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/vo/Caixa.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/dao/CaixaDAO.php';
$obj = new caixa();
$obj->setTipo($_POST['tipo']);
$obj->setDataPagamento($_POST['dataDePagamento']);
$obj->setDataVencimento(($_POST['dataDeVencimento']));
$obj->setDescricao($_POST['descricao']);
$obj->setFluxo($_POST['fluxo']);
$obj->setValor(($_POST['valor']));

$obj->setId($_POST['id']);
print_r($obj);
if($obj->getId()!=0)
  CaixaDAO::getInstance ()->update($obj);
else
CaixaDAO::getInstance()->insert($obj);
header("location: ../listarCaixa.php"); 
 ?>
