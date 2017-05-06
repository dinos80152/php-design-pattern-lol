<?php
namespace Game\Lol\Minion;

abstract class Minion
{
    private $health;

    public function __construct($health)
    {
        $this->health = $health;
    }

    public function injure($damage)
    {
        $this->health = $this->health - $damage;
    }

    public function getHealth()
    {
        return $this->health;
    }
}