<?php

namespace Game\Lol\Minion;

class Melee extends Minion
{
    public function __construct()
    {
        parent::__construct(450);
        echo "Melee Born";
        echo PHP_EOL;
    }
}
