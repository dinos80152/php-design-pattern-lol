<?php
abstract class Dragon
{
    protected $name;
    protected $level;
    protected $baseHealth;
    protected $gainHealth;
    protected $attackDamage;
    protected $attackSpeed;

    abstract public function attack();

    public function getHealth()
    {
        return $this->baseHealth + $this->gainHealth * $this->level;
    }
}

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
