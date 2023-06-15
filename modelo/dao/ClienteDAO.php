<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/dao/BDPDO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/vo/Cliente.php';

class ClienteDAO {
    public static $instance;
    private function __construct() {
}
    public static function getInstance() {
        if (!isset(self::$instance))
        self::$instance = new ClienteDAO();
    return self::$instance;
}
   
    public function insert(Cliente $cliente){
     try {
        $sql = "INSERT INTO cliente (nome,cpf,uf,cidade,logradouro,telefone,email) VALUES (:nome,:cpf,:uf,:cidade,:logradouro,:telefone,:email)";
        $p_sql = BDPDO::getInstance()->prepare($sql);
        $p_sql->bindValue(":nome", $cliente->getNome());
        $p_sql->bindValue(":email", $cliente->getEmail());
        $p_sql->bindValue(":cpf", $cliente->getCpf());
        $p_sql->bindValue(":uf", $cliente->getUf());
        $p_sql->bindValue(":cidade", $cliente->getCidade());
        $p_sql->bindValue(":logradouro", $cliente->getLogradouro());
        $p_sql->bindValue(":telefone", $cliente->getTelefone());

     return $p_sql->execute();
 }     catch (Exception $e) {
       print "Erro ao executar a função de salvar".$e->getMessage();
 }

}
public function update($cliente){     try {
        $sql = "UPDATE cliente SET nome=:nome,cpf=:cpf,uf=:uf,cidade=:cidade,logradouro=:logradouro,telefone=:telefone,email=:email where id=:id";
        $p_sql = BDPDO::getInstance()->prepare($sql);
        $p_sql->bindValue(":nome", $cliente->getNome());
        $p_sql->bindValue(":email", $cliente->getEmail());
        $p_sql->bindValue(":cpf", $cliente->getCpf());
        $p_sql->bindValue(":uf", $cliente->getUf());
        $p_sql->bindValue(":cidade", $cliente->getCidade());
        $p_sql->bindValue(":logradouro", $cliente->getLogradouro());
        $p_sql->bindValue(":telefone", $cliente->getTelefone());
        $p_sql->bindValue(":id", $cliente->getId());
        
     return $p_sql->execute();
 }     catch (Exception $e) {
       print "Erro ao executar a função de salvar".$e->getMessage();
 }
 
 }
public function delete($id){
    try {
        $sql = "delete from cliente where id= :id;";
        $p_sql = BDPDO::getInstance()->prepare($sql);
        $p_sql->bindvalue(":id", $id);
          return $p_sql->execute();
     }catch (Exception $e) {
         print "Erro ao executar a função de deletar".$e->getMessage();
     }
  }
public function getById($id){
    try {
            $sql = "SELECT * FROM cliente WHERE id=:id";
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
        $pojo = new Cliente;
        $pojo->setId($row['id']);
        $pojo->setNome($row['nome']);
        $pojo->setEmail($row['email']);
        $pojo->setCpf($row['cpf']);
        $pojo->setLogradouro($row['logradouro']);
        $pojo->setCidade($row['cidade']);
        $pojo->settelefone($row['telefone']);
        $pojo->setUf($row['uf']);
        return $pojo;
    }
public function listAll(){
         try {
            $sql = "SELECT * FROM cliente";
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
            $sql = "SELECT * FROM cliente " . $restanteDoSQL;
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