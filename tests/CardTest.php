<?php

namespace Tests;

use Config\Config;
use Config\ConfigMode;
use Exception;
use Models\Card;
use PHPUnit\Framework\TestCase;
use Services\CardService;

final class CardTest extends TestCase
{
    private CardService $cardService;

    protected function setUp(): void
    {
        Config::setMode(ConfigMode::TESTMODE);
        $this->cardService = new CardService();
    }

    protected function tearDown(): void
    {
        Config::setMode(ConfigMode::DEBUGMODE);
    }

    public function testGetAllCards(): void
    {
        $cards = $this->cardService->getAllCards();
        $this->assertNotEmpty($cards);
        $this->assertContainsOnlyInstancesOf(Card::class, $cards);
    }

    public function testGetOneCardByID(): void
    {
        $id = '019334a0-0000-7000-8000-000000000001';
        $card = $this->cardService->getCardById($id);

        $this->assertInstanceOf(Card::class, $card);
        $this->assertEquals($id, $card->getId());
    }

    public function testGetNonExistentID(): void
    {
        $this->expectException(Exception::class);
        $this->cardService->getCardById('id-inexistant-9999');
    }
}
