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
    function getXLocation()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT xLocation FROM planets WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['xLocation'];
    }
    function getYLocation()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT yLocation FROM planets WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['yLocation'];
    }
    function isNull()
    {
        if($this->id == -1)
        {
            return true;
        }
        return false;
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
    private static function getRarityArr($animalTypes)
    {
        $rarityArr = array();
        foreach ($animalTypes as $currAnimal)
        {
            $rarityArr[] = $currAnimal->getRarity();
        }
        return $rarityArr;
    }
    function pickAnimal()
    {
        $db = new DatabaseClass();
        $animalTypes = $this->getAnimalTypes();
        $numAnimalTypes = count($animalTypes);
        //Will have to do some sort of normilization
        //lower rarity values mean better chance that it
        //should hit the random numberl
        
        $rarityArr = PlanetClass::getRarityArr($animalTypes);
        $lcmRarity = MathClass::lcmArr($rarityArr);
        for($i = 0; $i < count($rarityArr); $i++)
        {
            $rarityArr[$i] = $lcmRarity/$rarityArr[$i];
        }
        $rarityTotal = MathClass::sumElementsInArr($rarityArr);
        $randNum = mt_rand(1,$rarityTotal);
        for($i = 0; $i < count($rarityArr); $i++)
        {
            if($randNum <= $rarityArr[$i])
            {
                $chosenAnimalTypeIndex = $i;
                break;
            }
            else
            {
                $randNum -= $rarityArr[$i];    
            }
        }
        $chosenAnimalType = $animalTypes[$chosenAnimalTypeIndex];
        
    }
}
?>