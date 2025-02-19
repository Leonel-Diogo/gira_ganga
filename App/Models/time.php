<?php
namespace App\Models;
use MF\Model\Model;
use PDO;
class Time extends Model
{
    #private $id_time;
    private $nome;
    private $capitao;
    private $qtd_jogadores;
    private $torneios_participando;
    private $status_atual;
    public function __get($atributo)
    {
        return $this->$atributo;
    }
    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    #MÉTODO PARA SALVAR USUÁRIO NA BD 
    public function cadastrar()
    {
        $query = "INSERT INTO tbtime(nome, capitao, qtd_jogadores, torneios_participando, status_atual)
                VALUES(:nome, :capitao, :qtd_jogadores, :torneios_participando, :status_atual)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":nome", $this->__get("nome"));
        $stmt->bindValue(":capitao", $this->__get("capitao"));
        $stmt->bindValue(":qtd_jogadores", $this->__get("qtd_jogadores"));
        $stmt->bindValue(":torneios_participando", $this->__get("torneios_participando"));
        $stmt->bindValue(":status_atual", $this->__get("status_atual"));
        $stmt->execute();
        return $this;
    }

    #PESQUISANDO POR USERS NO APP
    public function getAll()
    {

    }

}

?>