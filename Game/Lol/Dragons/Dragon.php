<?php

namespace Game\Lol\Dragons;

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

    public function getName()
    {
        return $this->name;
    }

}

