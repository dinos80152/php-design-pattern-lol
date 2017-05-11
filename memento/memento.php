<?php

class ItemMemento
{
    private $items = [];

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function getState()
    {
        return $this->items;
    }
}

class Originator
{
    private $items = [];

    public function set($items)
    {
        $this->items = $items;
    }

    public function save()
    {
        return new ItemMemento($this->items);
    }

    public function restore($memento)
    {
        return $memento->getState();
    }
}

class CareTaker
{
    private $itemMementos = [];

    public function addMemento($memento)
    {
        array_push($this->itemMementos, $memento);
    }

    public function getMemento()
    {
        return array_pop($this->itemMementos);
    }
}

class Player
{
    private $items = [];
    private $originator;
    private $careTaker;

    public function __construct()
    {
        $this->originator = new Originator();
        $this->careTaker = new CareTaker();
    }

    public function buyItem($item)
    {
        $this->originator->set($this->items);
        $this->careTaker->addMemento($this->originator->save());
        array_push($this->items, $item);
    }

    public function undoItem()
    {
        $this->items = $this->originator->restore($this->careTaker->getMemento());
    }

    public function getItems()
    {
        return $this->items;
    }
}

$player = new Player();
$player->buyItem("boot");
$player->buyItem("Health Potion");
$player->buyItem("Health Potion");
$player->buyItem("Health Potion");

echo implode(",", $player->getItems()) . PHP_EOL;

$player->undoItem();
$player->undoItem();

echo implode(",", $player->getItems()) . PHP_EOL;