<?php

interface AttackRange
{
    public function attackRange();
}

class NonAttackRange implements AttackRange
{
    public function attackRange() {
        echo "I can't attack\n";
    }
}

class ShortAttackRange implements AttackRange
{
    public function attackRange() {
        echo "attack short range\n";
    }
}

class LongAttackRange implements AttackRange
{
    public function attackRange() {
        echo "attack long range\n";
    }
}

class Champion
{

    private $attackRange;

    public function __construct(AttackRange $attackRange) {
        $this->attackRange = $attackRange;
    }

    public function performAttackRange() {
        $this->attackRange->attackRange();
    }

    public function setAttackRange(AttackRange $attackRange) {
        $this->attackRange = $attackRange;
    }
}

class Nidalee extends Champion
{
    private $mode;

    public function __construct() {
        parent::__construct(new LongAttackRange);
        $this->mode = "human";
    }

    public function transform () {
        if ($this->mode === "human") {
            $this->mode = "jaguar";
        } else {
            $this->mode = "human";
        }
        echo "Mode:" . $this->mode . "\n";
    }
}

// Initialize Nidalee as Human Mode
$nidalee = new Nidalee();
$nidalee->performAttackRange();

// Press R to transform to Jaguar mode
$nidalee->transform();
$nidalee->setAttackRange(new ShortAttackRange);
$nidalee->performAttackRange();

// Got disarm state, ex: Amumu ult.
$nidalee->setAttackRange(new NonAttackRange);
$nidalee->performAttackRange();