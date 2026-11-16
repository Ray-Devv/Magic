<?php

namespace Models;

use Exception;
use PDO;

class CardDAO extends BasePDODAO
{
    private function getFallbackCards(): array
    {
        return [[
            'id' => '019334a0-0000-7000-8000-000000000001',
            'name' => 'Carte de test',
            'cost' => '2',
            'types' => 'Creature',
            'flavortext' => null,
            'textbox' => null,
            'rarity' => 'commun',
            'power' => 2,
            'toughness' => 2,
            'extension' => 'Test',
            'illustrator' => 'Etudiant',
            'url_img' => 'https://example.com/card.png',
        ]];
    }

    public function getAll(): array
    {
        $sql = 'SELECT * FROM CARD';
        $stmt = $this->execRequest($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByID(string $id): array
    {
        $sql = 'SELECT * FROM CARD WHERE id = ?';
        $stmt = $this->execRequest($sql, [$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            throw new Exception("Carte introuvable avec l'ID : " . $id);
        }

        return $result;
    }
}
