<?php



class Servico extends Model
{



    //Método Listar todos os Serviços ativos por ordem alfabetica
    public function getCertificacoes()
    {

        $sql = "SELECT
                cli.id_cliente,                    -- 🔹 agora o ID do cliente vem corretamente
                cli.nome_cliente,
                cli.foto_cliente,

                p.id_produto,
                p.nome_produto AS produto,

                e.nome_certificacao AS etapa_atual,

                cp.status,
                cp.observacao_certificacao,
                cp.atualizado_em

            FROM tbl_certificacao_produto cp
            JOIN tbl_produto p ON p.id_produto = cp.id_produto
            JOIN tbl_cliente cli ON cli.id_cliente = p.id_cliente
            JOIN tbl_etapa_certificacao e ON e.id_etapa = cp.id_etapa

            WHERE cp.id_certificacao = (
                SELECT cp2.id_certificacao
                FROM tbl_certificacao_produto cp2
                WHERE cp2.id_produto = cp.id_produto
                ORDER BY cp2.atualizado_em DESC
                LIMIT 1
            )

            ORDER BY cli.nome_cliente, p.nome_produto;
            ";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
