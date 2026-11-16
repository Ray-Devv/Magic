<?php

namespace Models;

use Config\Config;
use PDO;
use PDOStatement;

abstract class BasePDODAO
{
    private ?PDO $db = null;

    protected function execRequest(string $sql, ?array $params = null): PDOStatement|false
    {
        $stmt = $this->getDB()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    private function getDB(): PDO
    {
        if ($this->db === null) {
            $this->db = new PDO(
                Config::get('dsn'),
                Config::get('user'),
                Config::get('pass'),
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }
        return $this->db;
    }
}
