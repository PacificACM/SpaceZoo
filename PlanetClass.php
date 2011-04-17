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
}
?>