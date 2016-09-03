<?php

require_once 'autoload.php';

$guide = new TouristsGuide(3);

$climate1 = new ClimateInfo(-5, 21);
$climate2 = new ClimateInfo(5, 32);
$climate3 = new ClimateInfo(8, 29);

$city1 = new MajorCity('Sofia', 'BGR', 0.5, $climate1, 1000000);
$city2 = new City('Paris', 'FRA', 0.8, $climate2);
$city3 = new City('London', 'GBR', 0.9, $climate3);

$guide->addCity($city1, false);
$guide->addCity($city2, true);
$guide->addCity($city3, true);

$advisor = new HotMegapolisAdvisor();

$bestCity = $guide->getBest($advisor);
echo PHP_EOL, str_repeat('-', 10) . 'Best City' . str_repeat('-', 10), PHP_EOL;
echo $bestCity;
