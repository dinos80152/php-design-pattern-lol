<?php

require dirname(__DIR__) . "/vendor/autoload.php";

use Game\Lol\Minion\{Melee, Caster};
use Game\Lol\Building\{Inhibitor, Nexus, Tower};
use Game\Lol\Monster\{Brambleback, Sentinel};

abstract class Map
{
    final public function create()
    {
        $this->createBuilding();
        $this->createMinion();
        if ($this->needMonster()) {
            $this->createMonster();
        }
    }

    abstract function createBuilding();

    abstract function createMinion();

    abstract function createMonster();

    function needMonster()
    {
        return true;
    }
}

class SummonersRift extends Map
{
    public function createBuilding()
    {
        new Nexus();
        for($i=0;$i<6;$i++) {
            new Tower();
        }
        new Inhibitor();
    }

    public function createMinion()
    {
        new Melee();
        new Caster();
    }

    public function createMonster()
    {
        new Brambleback();
        new Sentinel();
    }
}

class MurderBridge extends Map
{
    public function createBuilding()
    {
        new Nexus();
        for($i=0;$i<4;$i++) {
            new Tower();
        }
        new Inhibitor();
    }

    public function createMinion()
    {
        new Melee();
        new Caster();
    }

    public function createMonster()
    {
    }

    public function needMonster()
    {
        return false;
    }
}

echo "Welcome Summoner's Rift";
echo PHP_EOL;
$summonersRift = new SummonersRift();
$summonersRift->create();

echo "Welcome Murder Bridge";
echo PHP_EOL;
$murderBridge = new MurderBridge();
$murderBridge->create();