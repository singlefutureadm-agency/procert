<?php

class Usuario
{
    private PDO $conn;
    private string $table = "tbl_usuarios";

    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    /**
     * Verifica se existe um usuário com o e-mail informado
     */
    public function emailExiste(string $email): bool
    {
        $sql = "SELECT id FROM {$this->table} WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    /**
     * Registrar usuário
     */
    public function registrar(string $nome, string $email, string $senha, int $id_tipo): array
    {
        // verifica se já existe
        if ($this->emailExiste($email)) {
            return [
                "status" => false,
                "erro" => "E-mail já cadastrado."
            ];
        }

        $sql = "INSERT INTO {$this->table} (nome, email, senha, id_tipo)
                VALUES (:nome, :email, :senha, :id_tipo)";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":senha", $senha);
            $stmt->bindValue(":id_tipo", $id_tipo);

            $stmt->execute();

            return [
                "status" => true,
                "id" => $this->conn->lastInsertId()
            ];

        } catch (PDOException $e) {
            return [
                "status" => false,
                "erro" => "Erro ao registrar: " . $e->getMessage()
            ];
        }
    }

    /**
     * Autenticação
     */
    public function autenticar(string $email, string $senha)
    {
        $sql = "SELECT * FROM {$this->table} WHERE email = :email LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            return false;
        }

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($senha, $usuario['senha'])) {
            unset($usuario['senha']); // remove senha do array
            return $usuario;
        }

        return false;
    }

    /**
     * Listar usuários por tipo
     */
    public function listarPorTipo(int $id_tipo): array
    {
        $sql = "SELECT id, nome, email, id_tipo 
                FROM {$this->table} 
                WHERE id_tipo = :id_tipo";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id_tipo", $id_tipo);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
