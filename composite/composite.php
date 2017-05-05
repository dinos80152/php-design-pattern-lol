<?php

abstract class Component
{
    public function add(Component $component)
    {
        throw new BadMethodCallException();
    }

    public function getChild($key)
    {
        throw new BadMethodCallException();
    }

    public function __toString()
    {
        throw new BadMethodCallException();
    }
}

class Category extends Component
{
    private $components = [];
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function add(Component $component)
    {
        array_push($this->components, $component);
    }

    public function getChild($key)
    {
        return $this->components[$key];
    }

    public function __toString()
    {
        $str = "Category: {$this->name}";
        foreach($this->components as $component) {
            $str = $str . PHP_EOL;
            $str = $str . $component;
        }
        return $str;
    }

}

class Item extends Component
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

    public function __construct(Component $menu)
    {
        $this->menu = $menu;
    }

    public function show()
    {
        echo $this->menu;
    }
}

$ad = new Category("Attack Damage");
$ad->add(new Item("B.F. Sword", 1300, 40, 0));

$ap = new Category("Ability Power");
$ap->add(new Item("Blasting Wand", 850, 0, 40));

$support = new Category("Support Item");
$support->add(new Item("Ancient Coin", 350, 0, 0));

$weapon = new Category("Weapon");
$weapon->add($ad);
$weapon->add($ap);
$weapon->add($support);

$shop = new Shop($weapon);
$shop->show();