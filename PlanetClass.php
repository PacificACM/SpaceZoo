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
    function getLowTemp()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT lowTemp FROM planets WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['lowTemp'];
    }
    function getHighTemp()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT highTemp FROM planets WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['highTemp'];
    }
    function canPlanetSupport($animal)
    {
        if($animal->getLowTemp() > $this->getLowTemp())
        {
            return false;
        }
        if($animal->getHighTemp() < $this->getHighTemp())
        {
            return false;
        }
        return true;
    }
}
?>