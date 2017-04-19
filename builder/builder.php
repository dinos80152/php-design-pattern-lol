<?php

interface SummonerBuilder
{
    public function chooseChampion(String $name);

    public function addMastery($mastery);

    public function addRune($mastery);

    public function addSummonerSpell(String ...$spells);

    public function getSummoner();
}

class RiftSummonerBuilder implements SummonerBuilder
{

    private $summoner;
    private $champion;
    private $mastery;
    private $rune;
    private $summonerSpells = [];

    public function chooseChampion(String $name)
    {
        $this->champion = $name;
    }

    public function addMastery($mastery)
    {
        $this->mastery = $mastery;
    }

    public function addRune($rune)
    {
        $this->rune = $rune;
    }

    public function addSummonerSpell(String ...$spells)
    {

        $this->summonerSpell = $spells;
    }

    public function getSummoner()
    {

        $attack = $this->rune["attack"] + $this->mastery["attack"];
        $armor = $this->rune["armor"] + $this->mastery["armor"];
        $health = $this->rune["health"] + $this->mastery["health"];

        $this->summoners = [
            "champion" => [
                "name" => $this->champion,
                "attack" => $attack,
                "armor" => $armor,
                "health" => $health,
            ],
            "summonerSpells" => $this->summonerSpells,
        ];
        return $this->summoners;
    }
}

class Player1
{

    private $mastery = [
        "attack" => 12,
        "armor" => 12,
        "health" => 120,
    ];

    private $rune = [
        "attack" => 12,
        "armor" => 12,
        "health" => 120,
    ];

    private $builder;
    private $summoner;

    public function __construct(SummonerBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function summoner()
    {
        $this->builder->chooseChampion("Kog");
        $this->builder->addMastery($this->mastery);
        $this->builder->addRune($this->rune);
        $this->builder->addSummonerSpell("flash", "heal");
        $this->summoner = $this->builder->getSummoner();
        return $this->summoner;
    }
}

$player1 = new Player1(new RiftSummonerBuilder);
var_dump($player1->summoner());