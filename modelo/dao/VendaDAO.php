<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/dao/BDPDO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/vo/Venda.php';

class VendaDAO {
    public static $instance;
    private function __construct() {
}
    public static function getInstance() {
        if (!isset(self::$instance))
        self::$instance = new VendaDAO();
    return self::$instance;
}
   
    public function insert(Venda $venda){
     try {
        $sql = "INSERT INTO venda (formaDePagamento,valorTotal,cliente,data)VALUES (:formaDePagamento,:valorTotal,:cliente,:data)";
        $p_sql = BDPDO::getInstance()->prepare($sql);
        $p_sql->bindValue(":formaDePagamento", $venda->getFormaDePagamento());
        $p_sql->bindValue(":valorTotal", $venda->getValorTotal());
        $p_sql->bindValue(":cliente", $venda->getCliente());
        $p_sql->bindValue(":data", $venda->getData());

     return $p_sql->execute();
 }     catch (Exception $e) {
       print "Erro ao executar a função de salvar".$e->getMessage();
 }

}
public function update($venda){     try {
        $sql = "UPDATE venda SET formaDePagamento=:formaDePagamento,valorTotal=:valorTotal,data=:data,where id=:id";
        $p_sql = BDPDO::getInstance()->prepare($sql);
        $p_sql->bindValue(":formaDePagamento", $venda->getFormaDePagamento());
        $p_sql->bindValue(":valorTotal", $venda->getValorTotal());
        $p_sql->bindValue(":cliente", $venda->getCliente());
        $p_sql->bindValue(":data", $venda->getData());
        $p_sql->bindValue(":id", $venda->getId());
        
     return $p_sql->execute();
 }     catch (Exception $e) {
       print "Erro ao executar a função de salvar".$e->getMessage();
 }
 
 }
public function delete($id){
    try {
        $sql = "delete from venda where id= :id;";
        $p_sql = BDPDO::getInstance()->prepare($sql);
        $p_sql->bindvalue(":id", $id);
          return $p_sql->execute();
     }catch (Exception $e) {
         print "Erro ao executar a função de deletar".$e->getMessage();
     }
  }
public function getById($id){
    try {
            $sql = "SELECT * FROM venda WHERE id=:id";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            return $this->converterLinhaDeBaseDeDadosParaObjeto($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Oclientereu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
getCode() . " Mensagem: " . $e->getMessage());
        }
}

private function converterLinhaDeBaseDeDadosParaObjeto($row) {
        $pojo = new Venda;
        $pojo->setId($row['id']);
        $pojo->setFormaDePagamento($row['formaDePagamento']);
        $pojo->setValorTotal($row['valorTotal']);  
        $pojo->setCliente($row['cliente']);
        $pojo->setData($row['data']);
        return $pojo;
    }
public function listAll(){
         try {
            $sql = "SELECT * FROM venda";
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
            print "Oclientereu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
getCode() . " Mensagem: " . $e->getMessage());
        }
}

public function listWhere($restanteDoSQL,$arrayDeParamentos,$arrayDeValores) {
    try {
            $sql = "SELECT * FROM venda " . $restanteDoSQL;
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
            print "Oclientereu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
        } 
}
}
?>