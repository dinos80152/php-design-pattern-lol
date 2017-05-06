<?php

$startTime = microtime(true);

class Brush
{
    private $x;
    private $y;
    private $color;

    public function __construct($color)
    {
        $this->color = $color;
        $this->calculate();
    }

    public function display($x, $y)
    {
        echo "{$this->color} Brush grow up on {$x}, {$y}";
        echo PHP_EOL;
    }

    private function calculate()
    {
        $i = 0;
        $j = 0;
        while($i < 1000) {
            $i++;
            $j = $i + $j;
        }
    }
}

class BrushFactory
{
    private static $brushes = [];

    public static function getBrush($color)
    {
        if (empty(self::$brushes[$color])) {
            self::$brushes[$color] = new Brush($color);
        }
        return self::$brushes[$color];
    }
}

class BrushManager
{
    private $colors = ["Red", "Orange", "Yellow", "Green", "Blue", "Indigo", "Violet"];

    public function displayBrush()
    {
        $i = 0;
        while ($i < 10000) {
            $brush = BrushFactory::getBrush($this->colors[array_rand($this->colors)]);
            $brush->display(rand(0, 100), rand(0, 100));
            $i++;
        }
    }
}

$brushManager = new BrushManager();
$brushManager->displayBrush();

$endTime = microtime(true);
echo $endTime - $startTime;
echo PHP_EOL;
echo "Memory Usage: " . memory_get_peak_usage();
echo PHP_EOL;