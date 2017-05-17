<?php
/**
 * Visitor: MinionVisitor
 * ConcreteVisitor: HandOfBaron
 * Visitable: Visitable
 * ConcreteVisitable: Melee, Caster, Siege
 */

abstract class MinionVisitor
{
    abstract public function visitMelee($melee);
    abstract public function visitCaster($caster);
    abstract public function visitSiege($siege);
}

class HandOfBaron extends MinionVisitor
{
    public function visitMelee($melee)
    {
        $melee->attackRange = $melee->attackRange * 1.75;
    }

    public function visitCaster($caster)
    {
        $caster->attackRange = $caster->attackRange + 100;
    }

    public function visitSiege($siege)
    {
        $siege->attackRange = $siege->attackRange + 600;
        $siege->attackSpeed = $siege->attackSpeed * 1.5;
    }
}

interface Visitable
{
    public function accept($visitor);
}

class Melee implements Visitable
{

    public $attackRange = 110;

    public function accept($visitor)
    {
        $visitor->visitMelee($this);
    }
}

class Caster implements Visitable
{
    public $attackRange = 550;

    public function accept($visitor)
    {
        $visitor->visitCaster($this);
    }
}

class Siege implements Visitable
{
    public $attackRange = 300;
    public $attackSpeed = 1.00;

    public function accept($visitor)
    {
        $visitor->visitSiege($this);
    }
}

$handOfBaron = new HandOfBaron();
$minions = [
    new Melee(),
    new Melee(),
    new Caster(),
    new Caster(),
    new Siege(),
];

foreach($minions as $minion) {
    $minion->accept($handOfBaron);
    echo $minion->attackRange . PHP_EOL;
}