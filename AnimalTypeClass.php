<?php
function __autoload($className) {
  include $className . '.php';
}
class AnimalTypeClass
{
    private $id;
    function __construct($id)
    {
        $this->id = $id;
    }
    function createNewAnimalOfType()
    {
        mysql_query("INSERT INTO animals (name, type, rarity) VALUES ('Unnamed', $this->id, 1)");
        //need to fix rarity based on animalType own inherent rarity.
    }
    function getID()
    {
        return $this->id;
    }
    function getName()
    {
        $result = mysql_query("SELECT name FROM animalTypes WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['name'];
    }
    function getRarity()
    {
        $result = mysql_query("SELECT rarity FROM animalTypes WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['rarity'];
    }
    
}
?>