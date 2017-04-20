<?php

namespace Game\Lol\Dragons;

class InfernalDragon extends Dragon
{
    public function __construct()
    {
        $this->name = "infernal";
        $this->level = 1;
        $this->baseHealth = 3500;
        $this->gainHealth = 240;
        $this->attackDamage = 100;
        $this->attackSpeed = 0.500;
    }

    public function attack()
    {
        echo "{$this->name} attack, produce $this->attackDamage by speed $this->attackSpeed\n";
        echo "damage multiple champions at once.\n";
    }
}