<?php

require dirname(__DIR__) . "/vendor/autoload.php";

use Game\Lol\Dragons\{CloudDragon, InfernalDragon};

class DragonFactory
{
    public function makeDragon($type)
    {
        if ($type === "cloud") {
            return new CloudDragon();
        }
        if ($type === "infernal") {
            return new InfernalDragon();
        }
    }
}

$factory = new DragonFactory();

$dragon = $factory->makeDragon("cloud");
$health = $dragon->getHealth();
echo "Dragon Health is {$health}\n";
$dragon->attack();

$dragon = $factory->makeDragon("infernal");
$health = $dragon->getHealth();
echo "Dragon Health is {$health}\n";
$dragon->attack();
