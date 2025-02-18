<?php
include "./InterfaceDatabase.php";
class MySQLDB implements InterfaceDatabase {
    public function connexion(): PDO {
        $host = $_ENV["DB_HOST"] ?? null;
        $dbname = $_ENV["DB_NAME"] ?? null;
        $username = $_ENV["DB_USER"] ?? null;
        $password = $_ENV["DB_PASS"] ?? null;
        $dsn = "mysql:host=$host;
                dbname=$dbname;
                charset=utf8mb4";
        try {
            return new \PDO(
                $dsn,
                $username, 
                $password, 
                [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                ]
            );
            
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
}