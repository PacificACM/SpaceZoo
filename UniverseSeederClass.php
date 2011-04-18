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
            $tempLow = mt_rand(-265,200);
            $tempHighOffset = mt_rand(50,1000);
            $tempHigh = $tempLow + $tempHighOffset;
            $result = mysql_query("SELECT id FROM planets WHERE (ABS(xLocation - $xRand) < 50) AND (ABS(yLocation - $yRand) < 50)");
            $numRows = mysql_numrows($result);
            $query = "INSERT INTO planets (name, tempLow, tempHigh, xLocation, yLocation) VALUES ('Unnamed', $tempLow, $tempHigh, $xRand, $yRand)";
            if($numRows == 0)
            {
                mysql_query($query);
            }
        }
    }
    function createAnimalTypes($numTypes)
    {
        $db = new DatabaseClass();
        for($i = 0; $i < $numTypes; $i++)
        {
            $rarity = mt_rand(2,100);
            $tempLow = mt_rand(-265,200);
            $tempHigh = mt_rand(50, 1000);
            $query = "INSERT INTO animalTypes (name, rarity, tempLow, tempHigh) VALUES ('Unnamed', $rarity, $tempLow, $tempHigh)";
            echo $query;
            mysql_query($query) or die(mysql_error());
        }
    }
    function createPlanetAnimalTypes($numConnections)
    {
        $db = new DatabaseClass();
        for($i = 0; $i < $numConnections; $i++)
        {
            $result = mysql_query("SELECT id FROM planets") or die(mysql_error());
            $numPlanets = mysql_numrows($result);
            $result = mysql_query("SELECT id FROM animalTypes") or die(mysql_error());
            $numAnimalTypes = mysql_numrows($result);
            $numPlanet = mt_rand(0,$numPlanets);
            $numAnimalType = mt_rand(0,$numAnimalTypes);
            $currPlanet = new PlanetClass($numPlanet);
            $currAnimalType = new AnimalTypeClass($numAnimalType);
            if($currPlanet->canPlanetSupport($currAnimalType))
            {
                $query = "INSERT INTO planetAnimalTypes (animalTypeID, planetID) VALUES ($numAnimalType, $numPlanet)";
                mysql_query($query) or die(mysql_error());
            }
        }
    }
}
?>