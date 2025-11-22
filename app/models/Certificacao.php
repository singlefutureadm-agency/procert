<?php



class Certificacao extends Model
{




public function getCertificacaoCompleta($id_cliente, $id_produto)
{
    $sql = "SELECT 
                cli.id_cliente,
                cli.nome_cliente,
                cli.email_cliente,
                cli.telefone_cliente,
                cli.foto_cliente,
                p.id_produto,
                p.nome_produto,
                p.descricao_produto,
                p.criado_em,
                e.id_etapa,
                e.nome_certificacao AS etapa,
                e.ordem_certificacao,
                cp.status AS status_atual,
                cp.observacao_certificacao AS observacao_atual,
                cp.atualizado_em AS atualizado_em_atual,
                h.status_anterior,
                h.status_novo,
                h.observacao_certificacao AS historico_observacao,
                h.alterado_por,
                h.alterado_em
            FROM tbl_certificacao_produto cp
            JOIN tbl_produto p ON p.id_produto = cp.id_produto
            JOIN tbl_cliente cli ON cli.id_cliente = p.id_cliente
            JOIN tbl_etapa_certificacao e ON e.id_etapa = cp.id_etapa
            LEFT JOIN tbl_certificacao_historico h ON h.id_certificacao = cp.id_certificacao
            WHERE cli.id_cliente = :cliente
              AND p.id_produto = :produto
            ORDER BY e.ordem_certificacao ASC, h.alterado_em DESC";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':cliente', $id_cliente);
    $stmt->bindValue(':produto', $id_produto);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}






}
