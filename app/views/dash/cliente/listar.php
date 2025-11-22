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

    <h2 class="text-center mb-4 fw-bold text-black">Clientes Cadastrados</h2>

    <div class="table-responsive">
        <table class="table table-hover align-middle table-custom">

            <thead class="table-dark">
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Desativar</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($clientes as $linha): ?>
                    <tr id="cliente_<?= $linha['id_cliente'] ?>">

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
                        <td><?= htmlspecialchars($linha['email_cliente'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($linha['telefone_cliente'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($linha['sigla_uf'], ENT_QUOTES, 'UTF-8') ?></td>

                        <!-- Editar -->
                        <td>
                            <a
                                href="http://localhost/procert/public/clientes/editar/<?= $linha['id_cliente'] ?>"
                                class="btn-action"
                                title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>



                        <td class="status-action">
                            <?php if ($linha['status_cliente'] === 'Ativo'): ?>
                                <a href="#" class="btn-alterar-status"
                                    data-id="<?= $linha['id_cliente'] ?>"
                                    data-acao="desativar"
                                    title="Desativar">
                                    <i class="fas fa-ban text-danger fs-5"></i>
                                </a>
                            <?php else: ?>
                                <a href="#" class="btn-alterar-status"
                                    data-id="<?= $linha['id_cliente'] ?>"
                                    data-acao="ativar"
                                    title="Ativar">
                                    <i class="fas fa-check text-success fs-5"></i>
                                </a>
                            <?php endif; ?>
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
<script>
    /* Script melhorado com tratamento de erros e debug */
    let idSelecionado = null;
    let acaoSelecionada = null;

    document.addEventListener("click", function(e) {
        const btn = e.target.closest(".btn-alterar-status");
        if (!btn) return;

        e.preventDefault();
        idSelecionado = btn.dataset.id;
        acaoSelecionada = btn.dataset.acao;

        const texto = acaoSelecionada === "ativar" ?
            "Tem certeza que deseja <b>ativar</b> este cliente?" :
            "Tem certeza que deseja <b>desativar</b> este cliente?";

        document.getElementById("textoConfirmacao").innerHTML = texto;
        const modal = new bootstrap.Modal(document.getElementById("modalConfirmarStatus"));
        modal.show();
    });

    document.getElementById("btnConfirmarAcao").addEventListener("click", handleConfirm);

    async function handleConfirm() {
        const btn = document.getElementById("btnConfirmarAcao");
        btn.disabled = true;
        const originalText = btn.innerHTML;
        btn.innerHTML = 'Aguarde...';

        const url = `<?= BASE_URL ?>clientes/${acaoSelecionada}/${idSelecionado}`;

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                credentials: 'same-origin',
                cache: 'no-cache'
            });

            console.log('Status HTTP:', response.status, 'Redirected:', response.redirected, 'URL:', response.url);

            if (response.redirected) {
                window.location.href = response.url;
                return;
            }

            if (!response.ok) {
                const text = await response.text();
                console.error('Resposta não OK:', response.status, text);
                alert('Erro do servidor: ' + (text || response.status));
                return;
            }

            let data;
            try {
                if (response.status === 204) {
                    data = {
                        sucesso: true
                    };
                } else {
                    data = await response.json();
                }
            } catch (err) {
                const texto = await response.text();
                console.error('Falha ao parsear JSON. Resposta bruta:', texto);
                alert('Resposta inesperada do servidor. Verifique o console (F12).');
                return;
            }

            if (data && data.sucesso) {

                const modalEl = document.getElementById("modalConfirmarStatus");
                const modalInst = bootstrap.Modal.getInstance(modalEl);
                if (modalInst) modalInst.hide();

                console.log(data.mensagem || 'Status alterado com sucesso');

                // 🔥 ADICIONADO – recarregar a página após alterar status
                setTimeout(() => {
                    window.location.reload();
                }, 500);

            } else {
                console.warn('Resposta JSON sem sucesso:', data);
                alert(data && data.mensagem ? data.mensagem : 'Não foi possível alterar o status.');
            }
        } catch (err) {
            console.error('Erro na requisição fetch:', err);
            alert('Erro na requisição. Veja o console para mais detalhes.');
        } finally {
            btn.disabled = false;
            btn.innerHTML = originalText;
        }
    }
</script>