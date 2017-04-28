<?php

require dirname(__DIR__) . "/vendor/autoload.php";

use Game\Lol\Champion;

abstract class NobuChampion
{
    abstract public function w($target);
    abstract public function e($target);
    abstract public function r($target);
    abstract public function t($target);
}

class OdaNobunaga extends NobuChampion
{
    public function w($target)
    {
        echo "MatchLock";
        echo PHP_EOL;
    }
    public function e($target)
    {
        echo "Disaster thorn";
        echo PHP_EOL;
    }
    public function r($target)
    {
        echo "Great Sword-Heshikiri";
        echo PHP_EOL;
    }
    public function t($target)
    {
        echo "Crimson Tornado";
        echo PHP_EOL;
    }
}

class NobuChampionAdapter extends Champion
{

    private $champion;

    public function __construct(NobuChampion $champion)
    {
        $this->champion = $champion;
    }

    public function q($target)
    {
        $this->champion->w($target);
    }

    public function w($target)
    {
        $this->champion->e($target);
    }

    public function e($target)
    {
        $this->champion->r($target);
    }

    public function r($target)
    {
        $this->champion->t($target);
    }
}

$nobuChampion = new OdaNobunaga();
$lolChampion = new NobuChampionAdapter($nobuChampion);
$lolChampion->q(null);