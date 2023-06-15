<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/dao/ProdutoDAO.php';
ProdutoDAO::getInstance()->delete($_GET['id']);
header("location: ../listarProduto.php"); 