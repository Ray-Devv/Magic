<?php

namespace Controllers;

use Services\CardService;
use Twig\Environment;

class MainController {
    private Environment $templates;

    public function __construct(Environment $twig) {
        $this->templates = $twig;
    }

    public function index(): void {
        $cardService = new CardService();
        $cards = $cardService->getAllCards();

        echo $this->templates->render('home.twig', [
            'username' => 'test user',
            'cards' => $cards
        ]);
    }
}

