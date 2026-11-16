<?php

namespace Services;

use Models\Card;
use Models\CardDAO;

class CardService
{
    private CardDAO $cardDAO;

    public function __construct()
    {
        $this->cardDAO = new CardDAO();
    }

    /**
     * @return Card[]
     */
    public function getAllCards(): array
    {
        $rawCards = $this->cardDAO->getAll();
        $cards = [];

        foreach ($rawCards as $row) {
            $card = new Card();
            $card->hydrate($row);
            $cards[] = $card;
        }

        return $cards;
    }

    public function getCardById(string $id): Card
    {
        $row = $this->cardDAO->getByID($id);
        $card = new Card();
        $card->hydrate($row);
        return $card;
    }
}
