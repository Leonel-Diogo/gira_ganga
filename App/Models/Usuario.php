<?php
namespace App\Models;
use MF\Model\Model;
use PDO;
class Usuario extends Model
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    public function __get($atributo)
    {
        return $this->$atributo;
    }
    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    #MÉTODO PARA SALVAR USUÁRIO NA BD 
    public function salvar()
    {
        $query = "INSERT INTO tb_usuario(nome, email, senha)
                VALUES(:nome, :email, :senha)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':senha', $this->__get('senha'));#md5()->hash 32 carcteres
        $stmt->execute();
        return $this;
    }

    #VALIDAR SE UM CADASTRO PODE SER FEITO
    public function validarCadastro()
    {
        $valido = true;
        if (strlen($this->__get('nome')) < 3) {
            $valido = false;
        }
        if (strlen($this->__get('email')) < 3) {
            $valido = false;
        }
        if (strlen($this->__get('senha')) < 3) {
            $valido = false;
        }

        return $valido;
    }

    #VERIFICANDO SE O USUÁRIO JÁ EXISTE
    public function getUsuarioEmail()
    {
        $query = "SELECT nome, email from tb_usuario
                    WHERE email = :email
        ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function autenticar()
    {
        $query = "SELECT id, nome, email
                FROM tb_usuario
                WHERE email = :email
                AND senha = :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':senha', $this->__get('senha'));
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!empty($usuario['id']) && !empty($usuario['nome'])) {
            $this->__set('id', $usuario['id']);
            $this->__set('nome', $usuario['nome']);
        }
        return $this;
    }
    #PESQUISANDO POR USERS NO APP
    public function getAll()
    {
        $query = "SELECT u.id, u.nome, u.email,
                (
                    SELECT COUNT(*)
                    FROM tb_seguidores as us
                    WHERE us.id_usuario = :id_usuario
                    AND us.id_usuario_seguindo = u.id
                ) as seguindo_sn
                FROM tb_usuario as u
                WHERE nome like :nome
                AND id != :id_usuario";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', '%' . $this->__get('nome') . '%');
        $stmt->bindValue(':id_usuario', $this->__get('id'));
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    #SEGUIR USUÁRIO
    public function seguirUsuario($id_usuario_seguindo)
    {
        $query = "INSERT into tb_seguidores(id_usuario, id_usuario_seguindo)
            VALUES(:id_usuario, :id_usuario_seguidor)
            ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id'));
        $stmt->bindValue(':id_usuario_seguidor', $id_usuario_seguindo);
        $stmt->execute();
        return true;
    }
    public function deixarSeguirUsuario($id_usuario_seguindo)
    {
        $query = "DELETE FROM tb_seguidores
                    WHERE id_usuario = :id_usuario
                    AND id_usuario_seguindo = :id_usuario_seguindo
        ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue('id_usuario', $this->__get('id'));
        $stmt->bindValue('id_usuario_seguindo', $id_usuario_seguindo);
        $stmt->execute();
        return true;
    }

    #INFORMAÇÕES DE USUÁRIO
    public function getInfoUsuario()
    {
        $query = "SELECT nome FROM tb_usuario WHERE id = :id_usuario";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id'));
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    #TOTAL TWEETS
    public function getTotalTweets()
    {
        $query = "SELECT count(*) as total_tweets
         FROM tb_tweets
         WHERE id_usuario = :id_usuario";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id'));
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    #SEGUINDO
    public function getTotalSeguindo()
    {
        $query = "SELECT count(*) as total_seguindo
         FROM tb_seguidores
         WHERE id_usuario = :id_usuario";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id'));
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    #SEGUIDORES
    public function getTotalSeguidores()
    {
        $query = "SELECT count(*) as total_seguidores
         FROM tb_seguidores
         WHERE id_usuario_seguindo = :id_usuario";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id'));
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}

?>