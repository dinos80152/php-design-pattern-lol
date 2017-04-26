<?php

namespace Game\Lol;

class Mouse
{
    private static $mouse;
    private $position;

    private function __construct()
    {
        $this->position = [
            "x" => 10,
            "y" => 10
        ];

    }

    public static function getMouse() {
        if (is_null(self::$mouse)) {
            self::$mouse = new Mouse();
        }
        return self::$mouse;
    }

    public function getPosition()
    {
        return $this->position;
    }
}