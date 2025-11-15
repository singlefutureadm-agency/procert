<?php

class DashboardController
{
    public function index()
    {
        // Exigir login antes de abrir o dashboard
        Auth::exigirLogin();

        // Carregar a view
        require_once "../app/views/dashboard.php";
    }
}
