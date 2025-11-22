<?php

class Cliente extends Model
{


    public function buscarCliente($email)
    {

        $sql = "SELECT * FROM tbl_cliente WHERE email_cliente = :email AND status_cliente = 'Ativo'";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getContarCliente()
    {

        $sql = "SELECT COUNT(*) AS total_clientes FROM tbl_cliente";
        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function getListarCliente()
    {

        $sql = "SELECT 
                a.*, 
                e.sigla_uf 
            FROM 
                tbl_cliente AS a
            INNER JOIN 
                tbl_estado AS e 
                    ON a.id_uf = e.id_uf
            WHERE 
                a.status_cliente = 'Ativo'
            ORDER BY 
                a.nome_cliente ASC;
            ";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    
    
    public function addCliente($dados)
    {

        $sql = " INSERT INTO tbl_cliente (
                    nome_cliente, 
                    tipo_pessoa, 
                    nasc_cliente, 
                    email_cliente, 
                    senha_cliente, 
                    status_cliente, 
                    cpf_cliente,
                    cnpj_cliente,  
                    cep_cliente,  
                    telefone_cliente, 
                    endereco_cliente, 
                    bairro_cliente, 
                    id_tipo_usuario, 
                    cidade_cliente, 
                    id_uf
                ) VALUES (
                    :nome_cliente, 
                    :tipo_cliente, 
                    :nasc_cliente, 
                    :email_cliente, 
                    :senha_cliente, 
                    :status_cliente, 
                    :cpf_cliente,
                    :cnpj_cliente, 
                    :cep_cliente, 
                    :telefone_cliente, 
                    :endereco_cliente, 
                    :bairro_cliente, 
                    :id_tipo_usuario, 
                    :cidade_cliente, 
                    :id_uf
                )";


        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome_cliente', $dados['nome_cliente']);
        $stmt->bindValue(':tipo_cliente', $dados['tipo_cliente']);
        $stmt->bindValue(':nasc_cliente', $dados['nasc_cliente']);
        $stmt->bindValue(':email_cliente', $dados['email_cliente']);
        $stmt->bindValue(':senha_cliente', $dados['senha_cliente']);
        $stmt->bindValue(':id_tipo_usuario', '3');
        $stmt->bindValue(':status_cliente', 'Ativo');
        $stmt->bindValue(':cpf_cliente', $dados['cpf_cliente']);
        $stmt->bindValue(':cnpj_cliente', $dados['cnpj_cliente']);
        $stmt->bindValue(':cep_cliente', $dados['cep_cliente']);
        $stmt->bindValue(':telefone_cliente', $dados['telefone_cliente']);
        $stmt->bindValue(':endereco_cliente', $dados['endereco_cliente']);
        $stmt->bindValue(':bairro_cliente', $dados['bairro_cliente']);
        $stmt->bindValue(':cidade_cliente', $dados['cidade_cliente']);
        $stmt->bindValue(':id_uf', $dados['id_uf']);

        $stmt->execute();
        return $this->db->lastInsertId();
    }

        private function emailExisteUpdate($email, $id_cliente) {
            $sql = "SELECT COUNT(*) as total 
                    FROM tbl_cliente 
                    WHERE email_cliente = :email 
                    AND id_cliente != :id";

            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':id', $id_cliente);
            $stmt->execute();

            $r = $stmt->fetch(PDO::FETCH_ASSOC);
            return $r['total'] > 0;
        }


public function updateCliente($id, $dados) {

    // 1. Verifica se o email já existe em outro cliente
    if ($this->emailExisteUpdate($dados['email_cliente'], $id)) {
        return ['erro' => 'O e-mail informado já está em uso por outro cliente.'];
    }

    // 2. Atualiza normalmente
    $sql = "UPDATE tbl_cliente SET
            nome_cliente      = :nome_cliente,
            tipo_pessoa       = :tipo_cliente,
            nasc_cliente      = :nasc_cliente,
            email_cliente     = :email_cliente,
            senha_cliente     = :senha_cliente,
            cpf_cliente       = :cpf_cliente,
            cnpj_cliente      = :cnpj_cliente,
            cep_cliente       = :cep_cliente,
            telefone_cliente  = :telefone_cliente,
            endereco_cliente  = :endereco_cliente,
            bairro_cliente    = :bairro_cliente,
            cidade_cliente    = :cidade_cliente,
            id_uf             = :id_uf
        WHERE id_cliente = :id_cliente";

    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(':nome_cliente', $dados['nome_cliente']);
    $stmt->bindValue(':tipo_cliente', $dados['tipo_cliente']);
    $stmt->bindValue(':nasc_cliente', $dados['nasc_cliente']);
    $stmt->bindValue(':email_cliente', $dados['email_cliente']);
    $stmt->bindValue(':senha_cliente', $dados['senha_cliente']);
    $stmt->bindValue(':cpf_cliente', $dados['cpf_cliente']);
    $stmt->bindValue(':cnpj_cliente', $dados['cnpj_cliente']);
    $stmt->bindValue(':cep_cliente', $dados['cep_cliente']);
    $stmt->bindValue(':telefone_cliente', $dados['telefone_cliente']);
    $stmt->bindValue(':endereco_cliente', $dados['endereco_cliente']);
    $stmt->bindValue(':bairro_cliente', $dados['bairro_cliente']);
    $stmt->bindValue(':cidade_cliente', $dados['cidade_cliente']);
    $stmt->bindValue(':id_uf', $dados['id_uf']);
    $stmt->bindValue(':id_cliente', $id);

    $stmt->execute();

    return true;
}

    
    public function getclienteById($id)
    {

        $sql = "SELECT * FROM tbl_cliente
                WHERE id_cliente = :id_cliente;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_cliente', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // 6 Método para add FOTO GALERIA 

    public function addFotocliente($id_cliente, $arquivo)
    {
        $sql = "UPDATE tbl_cliente 
           SET foto_cliente = :foto_cliente 
           WHERE id_cliente = :id_cliente";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':foto_cliente', $arquivo);
        $stmt->bindValue(':id_cliente', $id_cliente);

        return $stmt->execute();
    }





   // Desativar Cliente 
    public function desativarCliente($id)
    {

        $sql = "UPDATE tbl_cliente SET status_cliente = 'Inativo'  WHERE id_cliente = :id_cliente ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_cliente', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

// Desativar Cliente 
    public function ativarCliente($id)
    {

        $sql = "UPDATE tbl_cliente SET status_cliente = 'Ativo'  WHERE id_cliente = :id_cliente ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_cliente', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }





}
