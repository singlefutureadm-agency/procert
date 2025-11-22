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
    .img-administrador {
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

    <h2 class="text-center mb-4 fw-bold text-black">Administradores Cadastrados</h2>

    <div class="table-responsive">
        <table class="table table-hover align-middle table-custom">

            <thead class="table-dark">
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Desativar</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($admins as $linha): ?>
                    <tr>

                        <!-- Foto -->
                        <td>
                            <img
                                src="<?php
                                        $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/procert/public/uploads/" . $linha['foto_funcionario'];

                                        if (!empty($linha['foto_funcionario']) && file_exists($caminhoArquivo)) {
                                            echo "http://localhost/procert/public/uploads/" . htmlspecialchars($linha['foto_funcionario'], ENT_QUOTES, 'UTF-8');
                                        } else {
                                            echo "http://localhost/procert/public/uploads/funcionario/sem-foto-funcionario.png";
                                        }
                                        ?>"
                                alt="Foto do funcionário"
                                class="img-administrador shadow-sm">
                        </td>

                        <td><?= htmlspecialchars($linha['nome_funcionario'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($linha['email_funcionario'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($linha['sigla_uf'], ENT_QUOTES, 'UTF-8') ?></td>

                        <!-- Editar -->
                        <td>
                            <a
                                href="http://localhost/procert/public/funcionarios/editar/<?= $linha['id_funcionario'] ?>"
                                class="btn-action"
                                title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>

                        <!-- Desativar -->
                        <td>
                            <a
                                href="http://localhost/procert/public/funcionarios/desativar/<?= $linha['id_funcionario'] ?>"
                                class="btn-action text-danger"
                                title="Desativar"
                                onclick="return confirm('Tem certeza que deseja desativar este funcionário?');">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

    <div class="text-center mt-4">
        <h4 class="text-black">Não encontrou o administrador? Cadastre abaixo</h4>
        <a href="http://localhost/procert/public/administrador/adicionar" class="btn btn-primary btn-lg mt-2">
            Adicionar administrador
        </a>
    </div>

</div>