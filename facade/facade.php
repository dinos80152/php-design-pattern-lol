<?php

require dirname(__DIR__) . "/vendor/autoload.php";

use Game\Lol\Minion\{Melee, Caster};
use Game\Lol\Building\{Inhibitor, Nexus, Tower};
use Game\Lol\Monster\{Brambleback, Sentinel};

class MapFacade
{
    public function initial()
    {
        $this->createBuilding();
        $this->createMinion();
        $this->createMonster();
    }

    private function createBuilding()
    {
        new Nexus();
        new Tower();
        new Inhibitor();
    }

    private function createMinion()
    {
        new Melee();
        new Caster();
    }

    private function createMonster()
    {
        new Brambleback();
        new Sentinel();
    }

}

$mapFacade = new MapFacade();
$mapFacade->initial();