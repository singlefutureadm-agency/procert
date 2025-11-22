<?php

class Administrador extends Model
{

    // ================================
    // Buscar funcionário pelo e-mail
    // ================================
    public function buscarFuncionario($email)
    {
        $sql = "SELECT * FROM tbl_funcionario 
                WHERE email_funcionario = :email 
                AND status_funcionario = 'Ativo'";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // ================================
    // Contar todos funcionários
    // ================================
    public function getContarFuncionario()
    {
        $sql = "SELECT COUNT(*) AS total_funcionarios FROM tbl_funcionario";
        $stmt = $this->db->query($sql);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // ================================
    // Listar funcionários (JOIN com estado)
    // ================================
    public function getListarAdministrador()
    {
        $sql = "SELECT 
                    f.*, 
                    e.sigla_uf 
                FROM 
                    tbl_funcionario AS f
                INNER JOIN 
                    tbl_estado AS e 
                        ON f.id_uf = e.id_uf
                WHERE 
                    f.status_funcionario = 'Ativo' and f.id_tipo_usuario = 1
                ORDER BY 
                    f.nome_funcionario ASC";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // ================================
    // Adicionar funcionário
    // ================================
    public function addFuncionario($dados)
    {
        $sql = "INSERT INTO tbl_funcionario (
                    nome_funcionario,
                    email_funcionario,
                    senha_funcionario,
                    id_tipo_usuario,
                    status_funcionario,
                    foto_funcionario,
                    id_uf
                ) VALUES (
                    :nome_funcionario,
                    :email_funcionario,
                    :senha_funcionario,
                    :id_tipo_usuario,
                    :status_funcionario,
                    :foto_funcionario,
                    :id_uf
                )";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome_funcionario', $dados['nome_funcionario']);
        $stmt->bindValue(':email_funcionario', $dados['email_funcionario']);
        $stmt->bindValue(':senha_funcionario', $dados['senha_funcionario']);
        $stmt->bindValue(':id_tipo_usuario', $dados['id_tipo_usuario']);
        $stmt->bindValue(':status_funcionario', $dados['status_funcionario']);
        $stmt->bindValue(':foto_funcionario', $dados['foto_funcionario']);
        $stmt->bindValue(':id_uf', $dados['id_uf']);

        $stmt->execute();
        return $this->db->lastInsertId();
    }


    // ================================
    // Atualizar funcionário
    // ================================
    public function updateFuncionario($id, $dados)
    {
        $sql = "UPDATE tbl_funcionario SET 
                    nome_funcionario = :nome_funcionario,
                    email_funcionario = :email_funcionario,
                    senha_funcionario = :senha_funcionario,
                    id_tipo_usuario = :id_tipo_usuario,
                    status_funcionario = :status_funcionario,
                    foto_funcionario = :foto_funcionario,
                    id_uf = :id_uf
                WHERE 
                    id_funcionario = :id_funcionario";
    
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome_funcionario', $dados['nome_funcionario']);
        $stmt->bindValue(':email_funcionario', $dados['email_funcionario']);
        $stmt->bindValue(':senha_funcionario', $dados['senha_funcionario']);
        $stmt->bindValue(':id_tipo_usuario', $dados['id_tipo_usuario']);
        $stmt->bindValue(':status_funcionario', $dados['status_funcionario']);
        $stmt->bindValue(':foto_funcionario', $dados['foto_funcionario']);
        $stmt->bindValue(':id_uf', $dados['id_uf']);
        $stmt->bindValue(':id_funcionario', $id);

        return $stmt->execute();
    }


    // ================================
    // Buscar funcionário por ID
    // ================================
    public function getFuncionarioById($id)
    {
        $sql = "SELECT * FROM tbl_funcionario
                WHERE id_funcionario = :id_funcionario";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_funcionario', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // ================================
    // Atualizar foto do funcionário
    // ================================
    public function updateFotoFuncionario($id_funcionario, $arquivo, $nome_funcionario)
    {
        $sql = "UPDATE tbl_funcionario SET 
                    foto_funcionario = :foto_funcionario,
                    alt_foto_funcionario = :alt_foto_funcionario
                WHERE 
                    id_funcionario = :id_funcionario";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':foto_funcionario', $arquivo);
        $stmt->bindValue(':alt_foto_funcionario', $nome_funcionario);
        $stmt->bindValue(':id_funcionario', $id_funcionario);

        return $stmt->execute();
    }
}
