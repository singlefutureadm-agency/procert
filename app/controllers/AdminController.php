<?php
// app/controllers/AdminController.php
require_once __DIR__ . "/../../core/Auth.php";

class AdminController {
    public function __construct() {
        // somente protege as actions que precisam; evita exigir admin já ao instanciar caso queira ações públicas
    }

    public function dashboard() {
        Auth::exigirLogin();
        require_once __DIR__ . "/../../views/dashboard.php";
    }

    // rota alternativa /admin que aponta para dashboard
    public function index() {
        $this->dashboard();
    }
}
