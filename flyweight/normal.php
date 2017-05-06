<?php

$startTime = microtime(true);

class Brush
{
    private $color;
    private $x;
    private $y;

    public function __construct($color, $x, $y)
    {
        $this->color = $color;
        $this->x = $x;
        $this->y = $y;
        $this->calculate();
    }

    public function display()
    {
        echo "{$this->color} Brush grow up on {$this->x}, {$this->y}";
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

$colors = ["Red", "Orange", "Yellow", "Green", "Blue", "Indigo", "Violet"];
$i = 0;
while ($i < 10000) {
    $brush = new Brush($colors[array_rand($colors)], rand(0, 100), rand(0, 100));
    $brush->display();
    $i++;
}

$endTime = microtime(true);
echo $endTime - $startTime;
echo PHP_EOL;
echo "Memory Usage: " . memory_get_peak_usage();
echo PHP_EOL;