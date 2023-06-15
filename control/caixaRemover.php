<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/dao/caixaDAO.php';
CaixaDAO::getInstance()->delete($_GET['id']);
header("location: ../listarcaixa.php"); 