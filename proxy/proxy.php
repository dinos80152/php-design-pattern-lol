<?php

require dirname(__DIR__) . "/vendor/autoload.php";

use Game\Player\Player;

interface PlayerInfo
{
    public function getName();
}

class RealPlayer extends Player implements PlayerInfo
{
    public function getName()
    {
        return $this->name;
    }
}

class PlayerProxy implements PlayerInfo
{

    private $player;
    private $name;

    public function __construct($name)
    {
        $this->player = new RealPlayer($name);
    }

    public function getName()
    {
        if (is_null($this->name)) {
            $this->name = $this->player->getName();
        }
        return $this->name;
    }
}

/*
 * Map couldn't set Player Data, only get player information
 */
class Map
{
    public function __construct(PlayerInfo $player)
    {
        echo "Welcome" . PHP_EOL;
        echo $player->getName() . PHP_EOL;
        //Error: undefined method setChampion, this method is hiding by proxy
        $player->setChampion(Blitzcrank);
    }
}

$player = new PlayerProxy("DinoLai");
$map = new Map($player);