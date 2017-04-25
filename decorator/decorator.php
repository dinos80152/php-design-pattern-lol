<?php

require dirname(__DIR__) . "/vendor/autoload.php";

use Game\Lol\Champion;

interface movement
{
    public function aura();
    public function move();
}

class Blitzcrank extends Champion implements movement
{

    private $speed = 325;
    private $aura = [];

    public function q($target)
    {
    }

    public function w($target)
    {
        $this->speed = $this->speed * 1.9;
        array_push($this->aura, "w");
        return $this;
    }

    public function e($target)
    {
    }

    public function r($target)
    {
    }

    public function move()
    {
        return $this->speed;
    }

    public function aura()
    {
        return $this->aura;
    }
}

abstract class Aura extends Champion
{

    protected $champion;

    public function __construct(Champion $champion)
    {
        $this->champion = $champion;
    }

    public function q($target)
    {
        return $this->champion->q($target);
    }

    public function w($target)
    {
        return $this->champion->w($target);
    }

    public function e($target)
    {
        return $this->champion->e($target);
    }

    public function r($target)
    {
        return $this->champion->r($target);
    }
}

class TailWind extends Aura implements movement
{
    public function aura()
    {
        $aura = $this->champion->aura();
        array_push($aura, "TailWind");
        return $aura;
    }

    public function move()
    {
        return $this->champion->move() * 1.05;
    }
}

class OnTheHunt extends Aura implements movement
{
    public function aura()
    {
        $aura = $this->champion->aura();
        array_push($aura, "OnTheHunt");
        return $aura;
    }

    public function move()
    {
        return $this->champion->move() * 1.6;
    }

}

$blitz = new Blitzcrank();
$blitz = $blitz->w(null);
$blitz = new OnTheHunt(new TailWind($blitz));
echo "Move Speed: " . $blitz->move();
echo PHP_EOL;
echo "With Aura: " . implode(",", $blitz->aura());
echo PHP_EOL;