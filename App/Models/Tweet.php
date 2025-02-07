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
        $query = "SELECT t.id, t.id_usuario, t.tweet, 
                     DATE_FORMAT(t.data_tweet, '%d/%m/%Y %H:%i') as data_tweet, 
                     u.nome
              FROM tb_tweets as t
              LEFT JOIN tb_usuario as u ON t.id_usuario = u.id
              WHERE t.id_usuario = :id_usuario
                 OR t.id_usuario IN (
                      SELECT id_usuario_seguindo 
                      FROM tb_seguidores 
                      WHERE id_usuario = :id_usuario_seguidor
                  )
              ORDER BY t.data_tweet DESC";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'), \PDO::PARAM_INT);
        $stmt->bindValue(':id_usuario_seguidor', $this->__get('id_usuario'), \PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    #RECUPERAR COM PAGINAÇÃO
    public function getPorPagina($limit, $offset)
    {
        $query = "SELECT t.id, t.id_usuario, t.tweet, 
                     DATE_FORMAT(t.data_tweet, '%d/%m/%Y %H:%i') as data_tweet, 
                     u.nome
              FROM tb_tweets as t
              LEFT JOIN tb_usuario as u ON t.id_usuario = u.id
              WHERE t.id_usuario = :id_usuario
                 OR t.id_usuario IN (
                      SELECT id_usuario_seguindo 
                      FROM tb_seguidores 
                      WHERE id_usuario = :id_usuario_seguidor
                  )
              ORDER BY t.data_tweet DESC
              LIMIT $limit
              offset $offset";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'), \PDO::PARAM_INT);
        $stmt->bindValue(':id_usuario_seguidor', $this->__get('id_usuario'), \PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    #RECUPERAR TOTAL DE TWEETS
    public function getTotalRegistros()
    {
        $query = "SELECT COUNT(*) as total
              FROM tb_tweets as t
              LEFT JOIN tb_usuario as u ON t.id_usuario = u.id
              WHERE t.id_usuario = :id_usuario
                 OR t.id_usuario IN (
                      SELECT id_usuario_seguindo 
                      FROM tb_seguidores 
                      WHERE id_usuario = :id_usuario_seguidor
                  )";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'), \PDO::PARAM_INT);
        $stmt->bindValue(':id_usuario_seguidor', $this->__get('id_usuario'), \PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    #REMOVER TWEETS
    public function removerTweet($id_tweet)
    {
        $query = "DELETE FROM tb_tweets WHERE id = :id_tweet AND id_usuario = :id_usuario";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_tweet', $id_tweet, \PDO::PARAM_INT);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'), \PDO::PARAM_INT);

        return $stmt->execute();
    }



}