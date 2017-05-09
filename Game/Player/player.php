<?php

namespace Game\Player;

use Game\Lol\Rune;

class Player
{
    protected $name;
    protected $rune;
    protected $champion;

    public function __construct($name)
    {
        $this->name = $name;
        $this->rune = new Rune();
    }

    public function setChampion($champion)
    {
        $this->champion = $champion;
    }
}