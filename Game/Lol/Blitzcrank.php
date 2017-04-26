<?php
namespace Game\Lol;

class Blitzcrank extends Champion
{
    public function q($target)
    {
        echo "Rocket Grab on {$target}";
        echo PHP_EOL;
    }

    public function w($target)
    {
        echo "Overdrive";
        echo PHP_EOL;
    }

    public function e($target)
    {
        echo "Power Fist";
        echo PHP_EOL;
    }

    public function r($target)
    {
        echo "Static Field";
        echo PHP_EOL;
    }
}
