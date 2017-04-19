<?php
namespace Game\Lol;

class Champion
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

    public function __construct(Attack $attackRange) {
        $this->attackRange = $attackRange;
    }

    public function performAttack() {
        $this->attackRange->attack();
    }

    public function setAttackRange(Attack $attackRange) {
        $this->attackRange = $attackRange;
    }
}