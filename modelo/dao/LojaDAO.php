<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/dao/BDPDO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/vo/Loja.php';

class LojaDAO {
    public static $instance;
    private function __construct() {
}
    public static function getInstance() {
        if (!isset(self::$instance))
        self::$instance = new LojaDAO();
    return self::$instance;
}
   
    public function insert(Loja $loja){
     try {
        $sql = "INSERT INTO loja (cnpj,id) VALUES (:cnpj,:id)";
        $p_sql = BDPDO::getInstance()->prepare($sql);
        $p_sql->bindValue(":cnpj", $loja->getCnpj());
        $p_sql->bindValue(":id", $loja->getId());

     return $p_sql->execute();
 }     catch (Exception $e) {
       print "Erro ao executar a função de salvar".$e->getMessage();
 }

}
public function update($loja){     try {
        $sql = "UPDATE loja SET cnpj=:cnpj,where id=:id";
        $p_sql = BDPDO::getInstance()->prepare($sql);
        $p_sql->bindValue(":cnpj", $loja->getCnpj());
        $p_sql->bindValue(":id", $loja->getId());

     return $p_sql->execute();
 }     catch (Exception $e) {
       print "Erro ao executar a função de salvar".$e->getMessage();
 }
 
 }
public function delete($id){
    try {
        $sql = "delete from loja where id= :id;";
        $p_sql = BDPDO::getInstance()->prepare($sql);
        $p_sql->bindvalue(":id", $id);
          return $p_sql->execute();
     }catch (Exception $e) {
         print "Erro ao executar a função de deletar".$e->getMessage();
     }
  }
public function getById($id){
    try {
            $sql = "SELECT * FROM loja WHERE id=:id";
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
        $pojo = new Loja;
        $pojo->setId($row['id']);
        $pojo->setCnpj($row['cnpj']);
      
        return $pojo;
    }
public function listAll(){
         try {
            $sql = "SELECT * FROM loja";
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
            $sql = "SELECT * FROM loja " . $restanteDoSQL;
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