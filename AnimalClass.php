<?php
require_once 'SecretsClass.php';
class AnimalClass
{
    function __construct($id)
    {
        $this->animal_id = $id;
    }
    function getRarity()
    {
        $result = mysql_query("SELECT rarity FROM animals WHERE id = $this->animal_id");
        $row = mysql_fetch_assoc($result);
        return $row['rarity'];
    }
}
?>