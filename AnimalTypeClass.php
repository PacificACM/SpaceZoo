<?php
class AnimalTypeClass
{
    private $id;
    function __construct($id)
    {
        $this->id = $id;
    }
    function createNewAnimal()
    {
        $db = new DatabaseClass();
        $newAnimalRarity = $this->getRarity();
        $newAnimalRarity += MathClass::getNormallyDistributedRand() / 4;
        if($newAnimalRarity <= 0)
        {
            $newAnimalRarity = 0;
        }
        mysql_query("INSERT INTO animals (name, type, rarity) VALUES ('Unnamed', $this->id, $newAnimalRarity)");
        $newAnimal = new AnimalClass(mysql_insert_id());
        return $newAnimal;
    }
    function getID()
    {
        return $this->id;
    }
    function getName()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT name FROM animalTypes WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['name'];
    }
    function getRarity()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT rarity FROM animalTypes WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['rarity'];
    }
    function getTempLow()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT tempLow FROM animalTypes WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['tempLow'];
    }
    function getTempHigh()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT tempHigh FROM animalTypes WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['tempHigh'];
    }
}
?>