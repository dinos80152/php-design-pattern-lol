<?php
/*
 * Kindred's passive ability: Mark of the Kindred
 * Handler: Stage
 */

abstract class Stage
{
    protected $min;
    protected $successor;

    public function setSuccessor(Stage $successor)
    {
        $this->successor = $successor;
    }

    public function mark($collected)
    {
        if ($collected >= $this->min) {
            $this->markMonster();
        } else {
            $this->successor->mark($collected);
        }
    }

    abstract protected function markMonster();
}

class FirstStage extends Stage
{
    public function __construct()
    {
        $this->min = 0;
    }

    protected function markMonster()
    {
        echo "Rift Scuttler" . PHP_EOL;
    }
}

class SecondStage extends Stage
{
    public function __construct()
    {
        $this->min = 1;
    }

    protected function markMonster()
    {
        echo "Rift Scuttler, Crimson Rapter, Gromp" . PHP_EOL;
    }
}

class ThirdStage extends Stage
{
    public function __construct()
    {
        $this->min = 4;
    }

    protected function markMonster()
    {
        echo "Ancient Krug, Blue Sentinel, Greater Murk Wolf, Red Brambleback" . PHP_EOL;
    }
}

class ForthStage extends Stage
{
    public function __construct()
    {
        $this->min = 8;
    }

    protected function markMonster()
    {
        echo "Rift Herald, Baron Nashor, Dragon, Elder Dragon" . PHP_EOL;
    }
}


$first = new FirstStage();
$second = new SecondStage();
$third = new ThirdStage();
$forth = new ForthStage();

$forth->setSuccessor($third);
$third->setSuccessor($second);
$second->setSuccessor($first);

$forth->mark(1);