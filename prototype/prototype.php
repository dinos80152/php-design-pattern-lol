<?php

require dirname(__DIR__) . "/vendor/autoload.php";

use Game\Lol\Dragons\{CloudDragon, InfernalDragon};
use Game\Lol\Champion;

class Map
{
    private $dragon;
    private $dragonType = ["cloud", "infernal"];

    public function __construct()
    {
        $this->setDragon();
    }

    public function setDragon()
    {
        $type = $this->dragonType[array_rand($this->dragonType)];
        $this->dragon = DragonFactory::makeDragon($type);
    }

    public function getDragon()
    {
        return $this->dragon;
    }
}

class DragonFactory
{
    public static function getClone($dragon)
    {
        return clone $dragon;
    }

    public static function makeDragon($type)
    {
        $class =  'Game\\Lol\\Dragons\\' . ucfirst($type) . "Dragon";
        return new $class;
    }

}

class Mordekaiser extends Champion
{
    public function q($target)
    {
    }

    public function w($target)
    {
    }

    public function e($target)
    {
    }

    public function r($dragon)
    {
        return DragonFactory::getClone($dragon);
    }
}

$morde = new Mordekaiser();
$map = new Map();
$dragon = $map->getDragon();
$petDragon = $morde->r($dragon);
$dragonName = $petDragon->getName();

echo "I have a {$dragonName} Dragon the same as the dragon on map";
echo PHP_EOL;

