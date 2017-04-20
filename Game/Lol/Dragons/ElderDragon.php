<?php

namespace Game\Lol\Dragons;

class ElderDragon extends Dragon
{
    public function __construct()
    {
        $this->name = "elder";
        $this->level = 1;
        $this->baseHealth = 6400;
        $this->gainHealth = 180;
        $this->attackDamage = 150;
        $this->attackSpeed = 0.500;
    }

    public function attack()
    {
        echo "{$this->name} attack, produce $this->attackDamage by speed $this->attackSpeed\n";
        echo "damage multiple champions at once.\n";
    }
}