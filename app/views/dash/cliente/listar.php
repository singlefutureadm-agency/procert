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
                                class="img-cliente shadow-sm"
                            >
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
                                title="Editar"
                            >
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>

                        <!-- Desativar -->
                        <td>
                            <a 
                                href="http://localhost/procert/public/clientes/desativar/<?= $linha['id_cliente'] ?>" 
                                class="btn-action text-danger"
                                title="Desativar"
                                onclick="return confirm('Tem certeza que deseja desativar este cliente?');"
                            >
                                <i class="bi bi-trash-fill"></i>
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
