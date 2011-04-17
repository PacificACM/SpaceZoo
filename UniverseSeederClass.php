<?php
class UniverseSeederClass
{
    function __construct()
    {
        
    }
    function addPlanetsToArea($xLocation1, $yLocation1, $xLocation2, $yLocation2, $planets)
    {
        $db = new DatabaseClass();
        for($i = 0; $i < $planets; $i++)
        {
            $xRand = mt_rand($xLocation1,$xLocation2);
            $yRand = mt_rand($yLocation1,$yLocation2);
            $xRandDecimal = mt_rand(0,100);
            $yRandDecimal = mt_rand(0,100);
            $xRand *= 100;
            $yRand *= 100;
            $xRand += $xRandDecimal;
            $yRand += $yRandDecimal;
            $tempLow = mt_rand(-265,1000);
            $tempHighOffset = mt_rand(50,1000);
            $tempHigh = $tempLow + $tempHighOffset;
            mysql_query("INSERT INTO planets (name, tempLow, tempHigh, xLocation, yLocation) VALUES ('Unnamed', $tempLow, $tempHigh, $xRand, $yRand))");
        }
    }
}
?>