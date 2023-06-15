<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/mkrl/modelo/dao/BDPDO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/mkrl/modelo/vo/UsuarioPermissao.php';

class UsuarioPermissaoDAO {

    public static $instance;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new UsuarioPermissaoDAO();
        return self::$instance;
    }

    public function insert(UsuarioPermissao $usuarioPermissao) {
        try {
            $sql = "INSERT INTO usuarioPermissao (nome,usuarioPermissao) VALUES (:nome,:usuarioPermissao)";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $usuarioPermissao->getNome());
            $p_sql->bindValue(":usuarioPermissao", $usuarioPermissao->getUsuarioPermissao());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de salvar" . $e->getMessage();
        }
    }

    public function update($usuarioPermissao) {
        try {
            $sql = "UPDATE usuarioPermissao SET nome=:nome,usuarioPermissao=:usuarioPermissao where id=:id";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $usuarioPermissao->getNome());
            $p_sql->bindValue(":usuarioPermissao", $usuarioPermissao->getUsuarioPermissao());


            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de salvar" . $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            $sql = "delete from usuarioPermissao where id= :id;";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindvalue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de deletar" . $e->getMessage();
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT * FROM usuarioPermissao WHERE id=:id";
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
        $pojo = new UsuarioPermissao();
        $pojo->setId($row['id']);
        $pojo->setIdUsuario($row['idUsuario']);
        $pojo->setIdPermissao($row['idPermissao']);
        return $pojo;
    }

    public function listAll() {
        try {
            $sql = "SELECT * FROM usuarioPermissao";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->execute();

            $lista = array();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            while ($row) {
                $lista[] = $this->converterLinhaDeBaseDeDadosParaObjeto($row);
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

    public function listWhere($restanteDoSQL, $arrayDeParamentos, $arrayDeValores) {
        try {
            $sql = "SELECT * FROM usuariopermissao " . $restanteDoSQL;
            $p_sql = BDPDO::getInstance()->prepare($sql);
            for ($i = 0; $i < sizeof($arrayDeParamentos); $i++) {
                $p_sql->bindValue($arrayDeParamentos[$i], $arrayDeValores[$i]);
            }
            $p_sql->execute();
            $lista = array();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            while ($row) {
                $lista[] = $this->converterLinhaDeBaseDeDadosParaObjeto($row);
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
