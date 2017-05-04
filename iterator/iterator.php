<?php

interface MyIterator
{
    public function hasNext();
    public function next();
}

class SummonersRiftItemMenuIterator implements MyIterator
{
    private $items = [];
    private $key = 0;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function hasNext()
    {
        if($this->key >= sizeof($this->items) || is_null($this->items[$this->key])) {
            return false;
        }
        return true;
    }

    public function next()
    {
        $item = $this->items[$this->key];
        $this->key++;
        return $item;
    }
}

abstract class ShopMenu
{
    abstract public function addItem($name, $price, $ad, $ap);
}

class SummonersRiftShopMenu extends ShopMenu
{

    private $items = [];

    public function __construct()
    {
        $this->addItem("Ancient Coin", 350, 0, 0);
        $this->addItem("B.F. Sword", 1300, 40, 0);
        $this->addItem("Blasting Wand", 850, 0, 40);
    }

    public function addItem($name, $price, $ad, $ap)
    {
        $item = new Item($name, $price, $ad, $ap);
        array_push($this->items, $item);
    }

    public function createIterator()
    {
        return new SummonersRiftItemMenuIterator($this->items);
    }
}

class item
{
    private $name;
    private $price;
    private $attackDamage;
    private $abilityPower;

    public function __construct($name, $price, $attackDamage, $abilityPower)
    {
        $this->name = $name;
        $this->price = $price;
        $this->attackDamage = $attackDamage;
        $this->abilityPower = $abilityPower;
    }

    public function __toString()
    {
        return "{$this->name}, \${$this->price}, ad: {$this->attackDamage}, ap: {$this->abilityPower}";
    }
}

class Shop
{

    private $menu;

    public function __construct(ShopMenu $menu)
    {
        $this->menu = $menu;
    }

    public function showItems()
    {
        $menuIterator = $this->menu->createIterator();
        $this->printItems($menuIterator);
    }

    private function printItems($iterator)
    {
        while($iterator->hasNext()) {
            echo $iterator->next();
            echo PHP_EOL;
        }
    }
}

$shop = new Shop(new SummonersRiftShopMenu());
$shop->showItems();