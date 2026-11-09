<?php

namespace controllers;

use Twig\Environment;

class MainController {
    private Environment $templates;

    public function __construct(Environment $twig) {
        $this->templates = $twig;
    }

    public function index(): void {
        echo $this->templates->render('home.twig', [
            'username' => 'test user' 
        ]);
    }
}
