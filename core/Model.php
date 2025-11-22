Conversation opened. 1 unread message.

Skip to content
Using Gmail with screen readers
Enable desktop notifications for Gmail.
   OK  No thanks
1 of 3,598
Colar em core> model.php
Inbox

Miguel Cezar Ferreira
12:26 AM (0 minutes ago)
to me

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

