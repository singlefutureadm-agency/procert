<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])) {
    $mensagem = $_SESSION['mensagem'];
    $tipo = $_SESSION['tipo-msg'];
    $classeAlerta = ($tipo == 'sucesso') ? 'alert-success' : 'alert-danger';

    echo '<div class="alert ' . $classeAlerta . ' text-center fw-bold" role="alert">'
        . htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8') .
        '</div>';

    unset($_SESSION['mensagem'], $_SESSION['tipo-msg']);
}
?>

<!-- Estilo Glassmorphism -->
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 1rem;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 32px rgba(31, 38, 135, 0.2);
    }

    .form-control,
    .form-select {
        background-color: rgba(255, 255, 255, 0.7);
        border: 1px solid rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(3px);
        border-radius: 0.5rem;
    }

    .form-control:focus,
    .form-select:focus {
        background-color: rgba(255, 255, 255, 0.9);
        box-shadow: 0 0 0 0.2rem rgba(160, 160, 255, 0.25);
    }

    .btn {
        border-radius: 0.5rem;
    }

    .alert {
        backdrop-filter: blur(6px);
        border-radius: 0.75rem;
    }

    .card-header {
        border-bottom: none;
    }
</style>

<form method="POST" action="<?= BASE_URL ?>administrador/editar/<?= $admin['id_funcionario']; ?>" enctype="multipart/form-data">
    <div class="container mt-4">
        <div class="row">

            <!-- FORMULÁRIO PRINCIPAL -->
            <div class="col-md-8">
                <div class="card glass-card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">Editar Funcionário</h5>
                        </div>
                    </div>

                    <div class="card-body">

                        <h6 class="text-uppercase text-muted mb-3">Informações Pessoais</h6>
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" name="nome_funcionario" 
                                       value="<?= $admin['nome_funcionario'] ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-control" name="email_funcionario" 
                                       value="<?= $admin['email_funcionario'] ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Senha (somente se quiser trocar)</label>
                                <input type="password" class="form-control" name="senha_funcionario" placeholder="•••••••">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Estado (UF)</label>
                                <select class="form-select" name="id_uf" required>
                                    <?php foreach ($estados as $uf): ?>
                                        <option value="<?= $uf['id_uf']; ?>" 
                                            <?= ($admin['id_uf'] == $uf['id_uf']) ? 'selected' : ''; ?>>
                                            <?= $uf['nome_uf']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- NOVO CAMPO -->
                            <div class="col-md-6">
                                <label class="form-label">Estado Funcionário</label>
                                <input type="text" class="form-control" name="estado_funcionario" 
                                       value="<?= $admin['estado_funcionario'] ?>">
                            </div>

                        </div>

                        <hr class="my-4">

                        <h6 class="text-uppercase text-muted mb-3">Dados Pessoa Física / Jurídica</h6>
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Tipo de Pessoa</label>
                                <select class="form-select" id="tipo_pessoa" name="tipo_pessoa" required>
                                    <option value="F" <?= ($admin['tipo_pessoa'] == 'F') ? 'selected' : ''; ?>>Física</option>
                                    <option value="J" <?= ($admin['tipo_pessoa'] == 'J') ? 'selected' : ''; ?>>Jurídica</option>
                                </select>
                            </div>

                            <div class="col-md-6 div-cpf">
                                <label class="form-label">CPF</label>
                                <input type="text" class="form-control" name="cpf_funcionario" 
                                       value="<?= $admin['cpf_funcionario'] ?>">
                            </div>

                            <div class="col-md-6 div-cnpj">
                                <label class="form-label">CNPJ</label>
                                <input type="text" class="form-control" name="cnpj_funcionario" 
                                       value="<?= $admin['cnpj_funcionario'] ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status_funcionario" required>
                                    <option value="1" <?= ($admin['status_funcionario'] == 1) ? 'selected' : ''; ?>>Ativo</option>
                                    <option value="0" <?= ($admin['status_funcionario'] == 0) ? 'selected' : ''; ?>>Inativo</option>
                                </select>
                            </div>

                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-success">Salvar Alterações</button>
                            <button type="reset" class="btn btn-danger">Limpar Campos</button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- FOTO DO PERFIL -->
            <div class="col-md-4">
                <div class="card card-profile glass-card text-center p-3">

                    <?php
                    $foto = (!empty($admin['foto_funcionario'])) 
                        ? BASE_URL . "uploads/" . $admin['foto_funcionario'] 
                        : BASE_URL . "uploads/sem-foto.jpg";
                    ?>

                    <img id="preview-img" src="<?= $foto ?>" class="rounded-circle border mb-3"
                         style="width:150px; height:150px; object-fit:cover; cursor:pointer;">

                    <input type="file" id="foto_funcionario" name="foto_funcionario" accept="image/*" style="display:none;">

                    <h5><?= $admin['nome_funcionario'] ?></h5>
                </div>
            </div>

        </div>
    </div>
</form>


<!-- Scripts -->
<script>
    function togglePasswordVisibility() {
        const input = document.getElementById("senha_cliente");
        const icon = document.getElementById("icon-password");
        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.replace("fa-eye-slash", "fa-eye");
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const previewImg = document.getElementById('preview-img');
        const inputFile = document.getElementById('foto_cliente');

        previewImg.addEventListener('click', () => inputFile.click());

        inputFile.addEventListener('change', () => {
            const file = inputFile.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = e => previewImg.src = e.target.result;
                reader.readAsDataURL(file);
            }
        });
    });
</script>
