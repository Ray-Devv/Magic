<?php

namespace Models;

class Card
{
    private ?string $id = null;
    private string $name;
    private string $cost;
    private string $types;
    private ?string $flavortext = null;
    private ?string $textbox = null;
    private string $rarity;
    private ?int $power = null;
    private ?int $toughness = null;
    private string $extension;
    private string $illustrator;
    private string $urlImg;

    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            // Convertit 'url_img' en 'setUrlImg'
            $method = 'set' . str_replace('_', '', ucwords($key, '_'));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCost(): string
    {
        return $this->cost;
    }

    public function setCost(string $cost): void
    {
        $this->cost = $cost;
    }

    public function getTypes(): string
    {
        return $this->types;
    }

    public function setTypes(string $types): void
    {
        $this->types = $types;
    }

    public function getFlavortext(): ?string
    {
        return $this->flavortext;
    }

    public function setFlavortext(?string $flavortext): void
    {
        $this->flavortext = $flavortext;
    }

    public function getTextbox(): ?string
    {
        return $this->textbox;
    }

    public function setTextbox(?string $textbox): void
    {
        $this->textbox = $textbox;
    }

    public function getRarity(): string
    {
        return $this->rarity;
    }

    public function setRarity(string $rarity): void
    {
        $this->rarity = $rarity;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(?int $power): void
    {
        $this->power = $power;
    }

    public function getToughness(): ?int
    {
        return $this->toughness;
    }

    public function setToughness(?int $toughness): void
    {
        $this->toughness = $toughness;
    }

    public function getExtension(): string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): void
    {
        $this->extension = $extension;
    }

    public function getIllustrator(): string
    {
        return $this->illustrator;
    }

    public function setIllustrator(string $illustrator): void
    {
        $this->illustrator = $illustrator;
    }

    public function getUrlImg(): string
    {
        return $this->urlImg;
    }

    public function setUrlImg(string $urlImg): void
    {
        $this->urlImg = $urlImg;
    }
}
