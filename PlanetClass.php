<?php
class PlanetClass
{
    private $id;
    function __construct($id)
    {
        $this->id = $id;
    }
    function getName()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT name FROM planets WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['name'];
    }
    function getTempLow()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT tempLow FROM planets WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['tempLow'];
    }
    function getTempHigh()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT tempHigh FROM planets WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['tempHigh'];
    }
    function canPlanetSupport($animalType)
    {
        if($animalType->getTempLow() > $this->getTempLow())
        {
            return false;
        }
        if($animalType->getTempHigh() < $this->getTempHigh())
        {
            return false;
        }
        return true;
    }
    function doesPlanetContain($animalType)
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT animalTypeID FROM planetAnimalTypes WHERE planetID = $this->id");
        while($row = mysql_fetch_assoc($result))
        {
            if($row['animalTypeID'] == $animalType->getID())
            {
                return true;
            }
        }
        return false;
    }
    function getAnimalTypes()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT animalTypeID FROM planetAnimalTypes WHERE planetID = $this->id");
        $animalTypes = array();
        while($row = mysql_fetch_assoc($result))
        {
            $animalTypes[] = new AnimalTypeClass($row['animalTypeID']);
        }
        return $animalTypes;
    }
    function gcm(a, b)
    {
	return ( b == 0 ) ? (a):( gcm(b, a % b) );
    }
    function lcm(a, b)
    {
        return ( a / gcm(a,b) ) * b;
    }
    private function lcmArr($arr)
    {
        if (count($arr) > 1)
        {
	    $arr[] = lcm( array_shift($arr) , array_shift($arr) );
            return lcmArr( $arr );
	}
        else
        {
	    return $arr[0];
	}
    }
    function pickAnimal()
    {
        $db = new DatabaseClass();
        $animalTypes = $this->getAnimalTypes();
        $numAnimalTypes = count($animalTypes);
        //Will have to do some sort of normilization
        //lower rarity values mean better chance that it
        //should hit the random numberl
        
        $rarityArr = array();
        foreach ($animalTypes as $currAnimal)
        {
            $rarityArr[] = $currAnimal->getRarity();
        }
        $lcmRarity = lcm_arr($rarityArr);
        for($i = 0; $i < count($rarityArr); $i++)
        {
            $rarityArr[$i] = $lcmRarity/$rarityArr[$i];
        }
        $rarityTotal = 0;
        for($i = 0; $i < count($rarityArr); $i++)
        {
            $rarityTotal += $rarityArr[$i];
        }
        
    }
}
?>