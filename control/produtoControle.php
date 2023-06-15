<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/vo/Produto.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/dao/ProdutoDAO.php';
$obj = new produto();
$obj->setTipo($_POST['tipo']);
$obj->setTamanho($_POST['tamanho']);
$obj->setCor(($_POST['cor']));
$obj->setQuantidade($_POST['quantidade']);
$obj->setPreco($_POST['preco']);
$obj->setEstoqueDoProduto(($_POST['estoqueDoProduto']));

$obj->setId($_POST['id']);
print_r($obj);
if($obj->getId()!=0)
    ProdutoDAO::getInstance ()->update($obj);
else
ProdutoDAO::getInstance()->insert($obj);
header("location: ../listarProduto.php"); 
 ?>
