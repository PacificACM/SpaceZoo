<?php
class AnimalClass
{
    private $id;
    function __construct($id)
    {
        $this->id = $id;
    }
    function getRarity()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT rarity FROM animals WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['rarity'];
    }
    function setRarity($rarity)
    {
        $db = new DatabaseClass();
        mysql_query("UPDATE animals SET rarity = $rarity WHERE user_id = $this->id");
    }
    function getTypeID()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT type FROM animals WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['type'];
    }
    function getName()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT name FROM animals WHERE id = $this->id");
        $row = mysql_fetch_assoc($result);
        return $row['name'];
    }
    function setName($name)
    {
        $db = new DatabaseClass();
        mysql_query("UPDATE animals SET name = '$name' WHERE id = $this->id");
    }
    function deleteAnimal()
    {
        $db = new DatabaseClass();
        mysql_query("DELETE FROM animals WHERE id = $this-id");
    }
}
?>