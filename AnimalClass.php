<?php
require_once 'SecretsClass.php';
class AnimalClass
{
    function __construct($id)
    {
        $this->id = $id;
    }
    function getRarity()
    {
        $result = mysql_query("SELECT rarity FROM animals WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['rarity'];
    }
    function setRarity($rarity)
    {
        mysql_query("UPDATE animals SET rarity = $rarity WHERE user_id = $this->id");
    }
    function getAnimalTypeID()
    {
        $result = mysql_query("SELECT type FROM animals WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['type'];
    }
    function getAnimalName()
    {
        $result = mysql_query("SELECT name FROM animals WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['name'];
    }
    function setAnimalName($name)
    {
        mysql_query("UPDATE animals SET name = $name WHERE user_id = $this->id");
    }
}
?>