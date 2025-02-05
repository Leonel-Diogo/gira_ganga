<?php
namespace App\Models;
use MF\Model\Model;


class Tweet extends Model
{
    private $id;
    private $id_usuario;
    private $tweet;
    private $data;
    public function __get($atributo)
    {
        return $this->$atributo;
    }
    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    #SALVAR
    public function salvar()
    {
        $query = "INSERT INTO tb_tweets(id_usuario, tweet)
        VALUES(:id_usuario, :tweet)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':tweet', $this->__get('tweet'));
        $stmt->execute();
        return $this;
    }
    #RECUPERAR
    public function getAll()
    {
        $query = "SELECT t.id, t.id_usuario, t.tweet, DATE_FORMAT(t.data_tweet, '%d/%m/%Y %H:%i') as data_tweet, u.nome
        FROM tb_tweets as t
        LEFT JOIN tb_usuario as u
        ON (t.id_usuario = u.id)
        WHERE id_usuario = :id_usuario
        ORDER BY t.data_tweet desc";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}