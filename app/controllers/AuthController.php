<?php
// app/controllers/AuthController.php
class AuthController {
    public function login() {
        require_once __DIR__ . "/../../views/login.php";
    }

    public function autenticar() {
        $db = getPDO();
        $usuarioModel = new Usuario($db);

        $email = trim($_POST['email'] ?? '');
        $senha = trim($_POST['senha'] ?? '');

        if (empty($email) || empty($senha)) {
            echo "Preencha todos os campos.";
            return;
        }

        $usuario = $usuarioModel->autenticar($email, $senha);

        if (!$usuario) {
            echo "E-mail ou senha inválidos.";
            return;
        }

        $_SESSION['usuario'] = $usuario;
        header("Location: " . BASE_URL . "dashboard");
        exit;
    }

    public function registrarCliente() {
        $db = getPDO();
        $usuarioModel = new Usuario($db);

        $nome  = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $senha = password_hash($_POST['senha'] ?? '', PASSWORD_BCRYPT);

        if (empty($nome) || empty($email)) {
            echo "Preencha todos os campos.";
            return;
        }

        $resultado = $usuarioModel->registrar($nome, $email, $senha, 3);
        if (!$resultado['status']) {
            echo $resultado['erro'];
            return;
        }

        header("Location: " . BASE_URL . "login");
        exit;
    }

    public function logout() {
        session_destroy();
        header("Location: " . BASE_URL . "login");
        exit;
    }
}
