<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/dao/BDPDO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/vo/Caixa.php';

class CaixaDAO {
    public static $instance;
    private function __construct() {
}
    public static function getInstance() {
        if (!isset(self::$instance))
        self::$instance = new CaixaDAO();
    return self::$instance;
}
   
    public function insert(Caixa $caixa){
     try {
        $sql = "INSERT INTO caixa (tipo,valor,descricao,dataVencimento,dataPagamento, fluxo) VALUES (:tipo,:valor,:descricao,:dataVencimento,:dataPagamento,:fluxo)";
        $p_sql = BDPDO::getInstance()->prepare($sql);
        $p_sql->bindValue(":tipo", $caixa->getTipo());
        $p_sql->bindValue(":valor", $caixa->getValor());
        $p_sql->bindValue(":descricao", $caixa->getDescricao());
        $p_sql->bindValue(":dataVencimento", $caixa->getDataVencimento());
        $p_sql->bindValue(":dataPagamento", $caixa->getDataPagamento());
        $p_sql->bindValue(":fluxo", $caixa->getFluxo());

     return $p_sql->execute();
 }     catch (Exception $e) {
       print "Erro ao executar a função de salvar".$e->getMessage();
 }

}
public function update($caixa){     try {
        $sql = "UPDATE caixa SET tipo=:tipo,valor=:valor,descricao=:descricao,dataVencimento=:dataVencimento,dataPagamento=:dataPagamento,fluxo=:fluxo where id=:id";
        $p_sql = BDPDO::getInstance()->prepare($sql);
        $p_sql->bindValue(":tipo", $caixa->getTipo());
        $p_sql->bindValue(":valor", $caixa->getValor());
        $p_sql->bindValue(":descricao", $caixa->getDescricao());
        $p_sql->bindValue(":dataVencimento", $caixa->getDataVencimento());
        $p_sql->bindValue(":dataPagamento", $caixa->getDataPagamento());
        $p_sql->bindValue(":fluxo", $caixa->getFluxo());
        $p_sql->bindValue(":id", $caixa->getId());
        
     return $p_sql->execute();
 }     catch (Exception $e) {
       print "Erro ao executar a função de salvar".$e->getMessage();
 }
 
 }
public function delete($id){
    try {
        $sql = "delete from caixa where id= :id;";
        $p_sql = BDPDO::getInstance()->prepare($sql);
        $p_sql->bindvalue(":id", $id);
          return $p_sql->execute();
     }catch (Exception $e) {
         print "Erro ao executar a função de deletar".$e->getMessage();
     }
  }
public function getById($id){
    try {
            $sql = "SELECT * FROM caixa WHERE id=:id";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            return $this->converterLinhaDeBaseDeDadosParaObjeto($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Odescricaoreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
getCode() . " Mensagem: " . $e->getMessage());
        }
}

private function converterLinhaDeBaseDeDadosParaObjeto($row) {
        $pojo = new Caixa;
        $pojo->setId($row['id']);
        $pojo->setTipo($row['tipo']);
        $pojo->setValor($row['valor']);  
        $pojo->setDescricao($row['descricao']);
        $pojo->setDataVencimento($row['dataVencimento']);
        $pojo->setDataPagamento($row['dataPagamento']);
        $pojo->setFluxo($row['fluxo']);
        return $pojo;
    }
public function listAll(){
         try {
            $sql = "SELECT * FROM caixa";
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
            print "Odescricaoreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
getCode() . " Mensagem: " . $e->getMessage());
        }
}

public function listWhere($restanteDoSQL,$arrayDeParamentos,$arrayDeValores) {
    try {
            $sql = "SELECT * FROM caixa " . $restanteDoSQL;
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
            print "Odescricaoreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
        } 
}
}
?>