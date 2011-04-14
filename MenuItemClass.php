<?php
class MenuItem
{
    private $name;
    private $path;
    function __construct($Name, $Path)
    {
        $this->name = $Name;
        $this->path = $Path;
    }
    function getName()
    {
        return $this->name;
    }
    function getPath()
    {
        return $this->path;
    }
    function printMenuItem()
    {
        echo "<a href='$this->path'>$this->name</a>";
    }
}
?>