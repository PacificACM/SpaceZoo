<?php
class MenuItemClass
{
    private $name;
    private $path;
    private $isCurrentPage;
    function __construct($Name, $Path, $IsCurrentPage)
    {
        $this->name = $Name;
        $this->path = $Path;
        $this->isCurrentPage = $IsCurrentPage;
    }
    function getName()
    {
        return $this->name;
    }
    function getPath()
    {
        return $this->path;
    }
    function getIsCurrentPage()
    {
        return $this->getIsCurrentPage();
    }
    function printMenuItem()
    {
        if($this->isCurrentPage)
        {
            echo "<h2 style='background: #eee;'>$this->name</h2>";
        }
        else
        {
            echo "<a href='$this->path'>$this->name</a>";
        }
    }
}
?>