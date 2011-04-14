<?php
class MenuItem
{
    private $name;
    private $path;
    function __construct($Name, $Path)
    {
        $name = $Name;
        $path = $Path;
    }
    function getName()
    {
        return $name;
    }
    function getPath()
    {
        return $path;
    }
    function printMenuItem()
    {
        echo "<a href='$this->getPath()'>$this->getName()</a>";
    }
}
?>