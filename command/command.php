<?php

require dirname(__DIR__) . "/vendor/autoload.php";

use Game\Lol\{Champion, Blitzcrank, Mouse};

interface Command
{
    public function execute();
}

class ChampionQ implements Command
{
    private $champion;

    public function __construct($champion)
    {
        $this->champion = $champion;
    }

    public function execute()
    {
        $mouse = Mouse::getMouse();
        $position = $mouse->getPosition();
        $position = implode(",", $position);
        $this->champion->q($position);
    }
}

class ChampionW implements Command
{
    private $champion;

    public function __construct($champion)
    {
        $this->champion = $champion;
    }

    public function execute()
    {
        $this->champion->w(null);
    }
}

class KeyBoard
{

    private $q;
    private $w;

    public function __construct()
    {
    }

    public function setCommand($commandQ, $commandW)
    {
        $this->q = $commandQ;
        $this->w = $commandW;
    }

    public function pressQ()
    {
        $this->q->execute();
    }

    public function pressW()
    {
        $this->w->execute();
    }
}

$blitz = new Blitzcrank();
$commandQ = new ChampionQ($blitz);
$commandW = new ChampionW($blitz);
$kb = new Keyboard();
$kb->setCommand($commandQ, $commandW);
$kb->pressW();
$kb->pressQ();