<?php

class Map
{
    private static $map;

    private function __construct()
    {

    }

    public static function getMap()
    {
        if (is_null(self::$map)) {
            self::$map = new Map();
        }
        return self::$map;
    }
}

$map1 = Map::getMap();
echo spl_object_hash($map1);
echo PHP_EOL;

$map2 = Map::getMap();
echo spl_object_hash($map2);
echo PHP_EOL;
