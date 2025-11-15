<?php
// views/dashboard.php
Auth::exigirLogin();
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Dashboard</title></head>
<body>
    <h1>Dashboard funcionando! 🔥</h1>
    <p>Bem-vindo, <?= htmlspecialchars($_SESSION['usuario']['nome'] ?? 'Usuário') ?></p>
    <p>Tipo: 
        <?php
            $t = $_SESSION['usuario']['id_tipo'] ?? 0;
            echo $t === 1 ? 'Administrador' : ($t === 2 ? 'Funcionário' : 'Cliente');
        ?>
    </p>
    <p><a href="<?= BASE_URL ?>logout">Sair</a></p>

    <?php if ($_SESSION['usuario']['id_tipo'] == 1): ?>
        <hr>
        <a href="<?= BASE_URL ?>admin/listar">Gerenciar usuários</a>
    <?php endif; ?>
</body>
</html>
