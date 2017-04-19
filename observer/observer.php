<?php

interface Subject {
    public function register(Observer $ob);
    public function remove(Observer $ob);
    public function notify();
}

interface Observer {
    public function update($dragonState);
}

class Player implements Observer {

    private $dragonState;
    private $map;
    private $account;
    private $legend;

    public function __construct(Subject $map, $account, $legend) {
        $this->account = $account;
        $this->legend = $legend;
        $this->map = $map;
        $this->map->register($this);
    }

    public function update($dragonState) {
        $this->dragonState = $dragonState;
        $this->display();
    }

    public function display() {
        $alive = $this->dragonState["alive"];
        $type = $this->dragonState["type"];
        $nextTime = date("H:i:s", $this->dragonState["nextTime"]);
        if ($alive) {
            echo "To {$this->account}({$this->legend}): {$type} Dragon is alive\n";
        } else {
            echo "To {$this->account}({$this->legend}): {$type} Dragon will respawn at {$nextTime}\n";
        }
    }
}

class Viewer implements Observer {

    private $dragonState;
    private $map;
    private $account;

    public function __construct(Subject $map, $account) {
        $this->account = $account;
        $this->map = $map;
        $this->map->register($this);
    }

    public function update($dragonState) {
        $this->dragonState = $dragonState;
        $this->display();
    }

    public function display() {
        $alive = $this->dragonState["alive"];
        $type = $this->dragonState["type"];
        $nextTime = date("H:i:s", $this->dragonState["nextTime"]);
        if ($alive) {
            echo "To {$this->account}: {$type} Dragon is alive\n";
        } else {
            echo "To {$this->account}: {$type} Dragon will respawn at {$nextTime}\n";
        }
    }
}

class Map implements Subject
{

    private $observers = [];
    private $dragon;
    private $dragonState;

    public function __construct() {
        $this->dragon = new Dragon();
    }

    public function register(Observer $ob) {
        array_push($this->observers, $ob);
    }

    public function remove(Observer $ob) {
        $this->observers = array_udiff($this->observers, [$ob], function($obSrc, $obTar) {
            return $obSrc !== $obTar;
        });
    }

    public function notify() {
        foreach($this->observers as $ob) {
            $ob->update($this->dragonState);
        }
    }

    public function objectStateChanged() {
        $this->notify();
    }

    public function setObjectsState() {
        $this->dragonState = $this->dragon->state();
        $this->objectStateChanged();
    }

    public function DragonKilled() {
        $this->dragon->dead();
        $this->setObjectsState();
    }

    public function DragonRespawn() {
        $this->dragon->respawn();
        $this->setObjectsState();
    }
}

class Dragon
{
    private $respawnSecond = 150;

    private $alive;
    private $types = ["cloud","infernal","mountain","ocean","elder"];
    private $type;
    private $second;
    private $nextTime = 0;

    public function __construct() {
    }

    public function respawn() {
        $this->alive = true;
        $this->second = 0;
    }

    public function dead() {
        $this->alive = false;
        $this->type = $this->types[array_rand($this->types)];
        $this->nextTime = time() + $this->respawnSecond;
    }

    public function state() {
        return [
            "alive" => $this->alive,
            "type" => $this->type,
            "nextTime" => $this->nextTime,
        ];
    }
}

$map = new Map();
$player1 = new Player($map, "DinoLai", "Kog");
$player1 = new Player($map, "abc", "Nidalee");
$player1 = new Player($map, "bbb", "Sona");

$viewer1 = new Viewer($map, "vvv");

$map->DragonKilled();
$map->DragonRespawn();

$map->remove($viewer1);

$map->DragonKilled();
$map->DragonRespawn();

