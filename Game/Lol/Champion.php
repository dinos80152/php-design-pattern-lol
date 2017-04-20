<?php
namespace Game\Lol;

abstract class Champion
{
    private $name;

    private $health;
    private $healthRegen;
    private $mana;
    private $manaRagen;
    private $moveSpeed;
    private $attackDamage;
    private $attackRange;
    private $attackSpeed;
    private $armor;
    private $mr;

    abstract public function q($target);

    abstract public function w($target);

    abstract public function e($target);

    abstract public function r($target);
}
