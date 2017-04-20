<?php

namespace Game\Lol\Dragons;

class CloudDragon extends Dragon
{
    public function __construct()
    {
        $this->name = "cloud";
        $this->level = 1;
        $this->baseHealth = 3500;
        $this->gainHealth = 240;
        $this->attackDamage = 50;
        $this->attackSpeed = 1.000;
    }

    public function attack()
    {
        echo "{$this->name} attack, produce $this->attackDamage by speed $this->attackSpeed\n";
        echo "damage multiple champions at once, dealing more damage to a single target.\n";
    }
}
