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
}

?>