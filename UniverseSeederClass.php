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
            $xRandDecimal = mt_rand(0,1000);
            $yRandDecimal = mt_rand(0,1000);
            $xRand *= 1000;
            $yRand *= 1000;
            $xRand += $xRandDecimal;
            $yRand += $yRandDecimal;
            $tempLow = mt_rand(-265,1000);
            $tempHighOffset = mt_rand(50,1000);
            $tempHigh = $tempLow + $tempHighOffset;
            $result = mysql_query("SELECT id FROM planets WHERE (ABS(xLocation - $xRand) < 50) AND (ABS(yLocation - $yRand) < 50)");
            $numRows = mysql_numrows($result);
            if($numRows == 0)
            {
                mysql_query("INSERT INTO planets (name, tempLow, tempHigh, xLocation, yLocation) VALUES ('Unnamed', $tempLow, $tempHigh, $xRand, $yRand))");
            }
        }
        mysql_close();
    }
}
?>