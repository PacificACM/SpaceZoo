<?php
require_once 'SecretsClass.php';
class AnimalTypeClass
{
    function __construct($id)
    {
        $this->id = $id;
    }
    function createNewAnimalOfType()
    {
        mysql_query("INSERT INTO animals (name, type, rarity) VALUES ('Unnamed', $this->id, 1)");
        //need to fix rarity based on animalType own inherent rarity.
    }
}
?>