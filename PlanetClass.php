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
        
    }
}
?>