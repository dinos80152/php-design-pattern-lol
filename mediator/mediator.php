<?php
/*
 * Mediator: GroundTargetAttacker
 * ConcreteMediator: Map
 * Colleague: Enemy
 * ConcreteColleague: Champion, Tower
 */

interface GroundTargetAttacker
{
    public function register(Enemy $creature);
    public function attack($damage, $creature);
}

class Map implements GroundTargetAttacker
{
    private $enemies = [];

    public function register(Enemy $creature)
    {
        array_push($this->enemies, $creature);
    }

    public function attack($damage, $assailant)
    {
        foreach($this->enemies as $enemy) {
            if ($assailant !== $enemy) {
                $enemy->injured($damage);
            }
        }
    }
}

interface Enemy
{
    public function attack();

    public function injured($damage);
}

class Champion implements Enemy
{
    private $groundAttacker;
    private $name;
    private $damage;

    public function __construct(GroundTargetAttacker $groundAttacker, $damage, $name)
    {
        $this->groundAttacker = $groundAttacker;
        $this->groundAttacker->register($this);
        $this->name = $name;
        $this->damage = $damage;
    }

    public function attack()
    {
        $this->groundAttacker->attack($this->damage, $this);
    }

    public function injured($damage)
    {
        echo "{$this->name} Got {$damage} Damage" . PHP_EOL;
    }
}

class Tower implements Enemy
{
    private $groundAttacker;
    private $name;
    private $damage;

    public function __construct(GroundTargetAttacker $groundAttacker, $damage, $name)
    {
        $this->groundAttacker = $groundAttacker;
        $this->groundAttacker->register($this);
        $this->name = $name;
        $this->damage = $damage;
    }

    public function attack()
    {
        $this->groundAttacker->attack($this->damage, $this);
    }

    public function injured($damage)
    {
        echo "I am Tower, I don't care" . PHP_EOL;
    }
}



$map = new Map();
$champ1 = new Champion($map, 20, "a");
$champ2 = new Champion($map, 15, "b");
$Tower = new Tower($map, 100, "c");

$champ1->attack();
$champ2->attack();
$Tower->attack();