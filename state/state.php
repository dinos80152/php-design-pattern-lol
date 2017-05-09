<?php

class Ability
{
    private $disable;
    private $learnable;
    private $ready;
    private $used;

    private $state;

    public function __construct()
    {
        $this->disable = new Disable($this);
        $this->learnable = new Learnable($this);
        $this->ready = new Ready($this);
        $this->used = new Used($this);

        $this->state = $this->disable;
    }

    public function learn()
    {
        $this->state->learn();
    }

    public function use()
    {
        $this->state->use();
    }

    public function coolDown()
    {
        $this->state->coolDown();
    }

    public function readyToLearn()
    {
        $this->setState($this->learnable);
    }

    public function setState(State $state)
    {
        $this->state = $state;
    }

    public function getDisableState()
    {
        return $this->disable;
    }

    public function getLearnableState()
    {
        return $this->learnable;
    }

    public function getReadyState()
    {
        return $this->ready;
    }

    public function getUsedState()
    {
        return $this->used;
    }
}

abstract class State
{
    protected $ability;

    public function __construct($ability)
    {
        $this->ability = $ability;
    }

    abstract public function learn();
    abstract public function use();
    abstract public function coolDown();
}

class Disable extends State
{
    public function learn()
    {
        echo "No Ability Point" . PHP_EOL;
    }

    public function use()
    {
        echo "This ability has not learned" . PHP_EOL;
    }

    public function coolDown()
    {
        throw new BadMethodCallException();
    }
}

class Learnable extends State
{
    public function learn()
    {
        echo "Ability Upgrade" . PHP_EOL;
        $this->ability->setState($this->ability->getreadyState());
    }

    public function use()
    {
        echo "Upgrade First" . PHP_EOL;
    }

    public function coolDown()
    {
        throw new BadMethodCallException();
    }
}

class Ready extends State
{
    public function learn()
    {
        echo "No Ability Point" . PHP_EOL;
    }

    public function use()
    {
        echo "Use Ability" . PHP_EOL;
        $this->ability->setState($this->ability->getUsedState());
    }

    public function coolDown()
    {
        echo "Ability is already." . PHP_EOL;
    }
}

class Used extends State
{
    public function learn()
    {
        echo "No Ability Point" . PHP_EOL;
    }

    public function use()
    {
        echo "Ability is not Ready." . PHP_EOL;
    }

    public function coolDown()
    {
        echo "Ability is Cooling Down" . PHP_EOL;
        $this->ability->setState($this->ability->getReadyState());
    }
}

$ability = new Ability();

// use before learning
$ability->use();

// learn and use
$ability->readyToLearn();
$ability->use();
$ability->learn();
$ability->use();
$ability->use();
$ability->coolDown();
$ability->coolDown();
$ability->learn();