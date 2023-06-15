<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/dao/BDPDO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/vo/Produto.php';

class ProdutoDAO {
    public static $instance;
    private function __construct() {
}
    public static function getInstance() {
        if (!isset(self::$instance))
        self::$instance = new ProdutoDAO();
    return self::$instance;
}
   
    public function insert(Produto $produto){
     try {
        $sql = "INSERT INTO produto (tipo,tamanho,cor,quantidade,preco,estoqueDoProduto) VALUES (:tipo,:tamanho,:cor,:quantidade,:preco,:estoqueDoProduto)";
        $p_sql = BDPDO::getInstance()->prepare($sql);
        $p_sql->bindValue(":tipo", $produto->getTipo());
        $p_sql->bindValue(":tamanho", $produto->getTamanho());
        $p_sql->bindValue(":cor", $produto->getCor());
        $p_sql->bindValue(":quantidade", $produto->getQuantidade());
        $p_sql->bindValue(":preco", $produto->getPreco());
        $p_sql->bindValue(":estoqueDoProduto", $produto->getEstoqueDoProduto());

     return $p_sql->execute();
 }     catch (Exception $e) {
       print "Erro ao executar a função de salvar".$e->getMessage();
 }

}
public function update($produto){     try {
        $sql = "UPDATE produto SET tipo=:tipo,tamanho=:tamanho,quantidade=:quantidade,preco=:preco,estoqueDoProduto=:estoqueDoProduto where id=:id";
        $p_sql = BDPDO::getInstance()->prepare($sql);
        $p_sql->bindValue(":tipo", $produto->getTipo());
        $p_sql->bindValue(":tamanho", $produto->getTamanho());
        $p_sql->bindValue(":cor", $produto->getCor());
        $p_sql->bindValue(":quantidade", $produto->getQuantidade());
        $p_sql->bindValue(":preco", $produto->getPreco());
        $p_sql->bindValue(":estoqueDoProduto", $produto->getEstoqueDoProduto());
        $p_sql->bindValue(":id", $produto->getId());
        
     return $p_sql->execute();
 }     catch (Exception $e) {
       print "Erro ao executar a função de salvar".$e->getMessage();
 }
 
 }
public function delete($id){
    try {
        $sql = "delete from produto where id= :id;";
        $p_sql = BDPDO::getInstance()->prepare($sql);
        $p_sql->bindvalue(":id", $id);
          return $p_sql->execute();
     }catch (Exception $e) {
         print "Erro ao executar a função de deletar".$e->getMessage();
     }
  }
public function getById($id){
    try {
            $sql = "SELECT * FROM produto WHERE id=:id";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            return $this->converterLinhaDeBaseDeDadosParaObjeto($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
getCode() . " Mensagem: " . $e->getMessage());
        }
}

private function converterLinhaDeBaseDeDadosParaObjeto($row) {
        $pojo = new Produto;
        $pojo->setId($row['id']);
        $pojo->setTipo($row['tipo']);
        $pojo->setTamanho($row['tamanho']);  
        $pojo->setCor($row['cor']);
        $pojo->setQuantidade($row['quantidade']);
        $pojo->setPreco($row['preco']);
        $pojo->setEstoqueDoProduto($row['estoqueDoProduto']);
        return $pojo;
    }
public function listAll(){
         try {
            $sql = "SELECT * FROM produto";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->execute();
            
            $lista=array();
            $row=$p_sql->fetch(PDO::FETCH_ASSOC);
            while($row){
                $lista[]=$this->converterLinhaDeBaseDeDadosParaObjeto($row);
                $row = $p_sql->fetch(PDO::FETCH_ASSOC);
             }
             
                return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
getCode() . " Mensagem: " . $e->getMessage());
        }
}

public function listWhere($restanteDoSQL,$arrayDeParamentos,$arrayDeValores) {
    try {
            $sql = "SELECT * FROM produto " . $restanteDoSQL;
            $p_sql = BDPDO::getInstance()->prepare($sql);
            for ($i = 0;$i< sizeof($arrayDeParamentos);$i++){
            $p_sql->bindValue($arrayDeParamentos[$i],$arrayDeValores[$i]); 
            
            }
            $p_sql->execute();
            $lista=array();
            $row=$p_sql->fetch(PDO::FETCH_ASSOC);
            while($row){
                $lista[]=$this->converterLinhaDeBaseDeDadosParaObjeto($row);
                $row = $p_sql->fetch(PDO::FETCH_ASSOC);
             }
                return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
        } 
}
}
?>