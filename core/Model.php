
<?php

class Model {

    protected static $connection = null;
    protected $db;

    public function __construct()
    {
        // Se a conexão AINDA não existe, cria
        if (self::$connection === null) {
            try {

                self::$connection = new PDO(
                    'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST,
                    DB_USER,
                    DB_PASS,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_PERSISTENT => false // mantém leve e seguro
                    ]
                );

            } catch (PDOException $e) {
                echo "Falha de conexão: " . $e->getMessage();
                exit;
            }
        }

        // Reaproveita a conexão existente
        $this->db = self::$connection;
    }
}

