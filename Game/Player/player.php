<?php

namespace Game\Player;

use Game\Lol\Rune;

class Player1
{

    private $rune;

    public function __construct()
    {
        $this->rune = new Rune();
    }
}