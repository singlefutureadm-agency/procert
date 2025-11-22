<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])) {

    $mensagem = $_SESSION['mensagem'];
    $tipo = $_SESSION['tipo-msg'];

    echo '<div class="alert alert-' . ($tipo == 'sucesso' ? 'success' : 'danger') . ' text-center" role="alert">'
        . htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8') .
        '</div>';

    unset($_SESSION['mensagem']);
    unset($_SESSION['tipo-msg']);
}
?>

<style>
    .img-cliente {
        width: 60px !important;
        height: 60px !important;
        object-fit: cover;
        border-radius: 50%;
        display: block;
        margin: 0 auto;
    }

    .btn-action {
        font-size: 1.2rem;
        color: #0d6efd;
    }

    .btn-action:hover {
        opacity: .8;
    }

    .table-custom th {
        white-space: nowrap;
    }
</style>

<div class="container">

    <h2 class="text-center mb-4 fw-bold text-black">Processos de Certificação</h2>

    <div class="table-responsive">
        <table class="table table-hover align-middle table-custom">

            <thead class="table-dark">
                <tr>

                    <th></th>
                    <th>Nome</th>
                    <th>Produto</th>
                    <th>Etapa</th>
                    <th>Status</th>
                    <th>Observação</th>
                    <th>Atualizado em</th>
                    <th> </th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($servicos as $linha): ?>
                    <tr>

                        <!-- Foto -->
                        <td>
                            <img
                                src="<?php
                                        $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/procert/public/uploads/" . $linha['foto_cliente'];

                                        if (!empty($linha['foto_cliente']) && file_exists($caminhoArquivo)) {
                                            echo "http://localhost/procert/public/uploads/" . htmlspecialchars($linha['foto_cliente'], ENT_QUOTES, 'UTF-8');
                                        } else {
                                            echo "http://localhost/procert/public/uploads/cliente/sem-foto-cliente.png";
                                        }
                                        ?>"
                                alt="Foto do Cliente"
                                class="img-cliente shadow-sm">
                        </td>

                        <td><?= htmlspecialchars($linha['nome_cliente'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($linha['produto'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($linha['etapa_atual'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($linha['status'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($linha['observacao_certificacao'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($linha['atualizado_em'], ENT_QUOTES, 'UTF-8') ?></td>

                        <!-- Editar -->
                        <td>
                            <a href="<?= BASE_URL ?>certificacao/verMais/<?= $linha['id_cliente'] ?>/<?= $linha['id_produto'] ?>"
                                class="btn-action"
                                title="Ver mais">
                                Ver mais
                            </a>

                        </td>




                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="text-center mt-4">
        <h4 class="text-black">Não encontrou o cliente? Cadastre abaixo</h4>
        <a href="http://localhost/procert/public/clientes/adicionar" class="btn btn-primary btn-lg mt-2">
            Adicionar Cliente
        </a>
    </div>

</div>

<div class="modal fade" id="modalConfirmarStatus" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar ação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p id="textoConfirmacao"></p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" id="btnConfirmarAcao" class="btn btn-primary">Confirmar</button>
            </div>
        </div>
    </div>
</div>