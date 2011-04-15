<?php
function __autoload($className) {
  include $className . '.php';
}
class MenuClass
{
    private $menuItems;
    function __construct()
    {
        $this->menuItems = array();
    }
    function addMenuItem($newMenuItem)
    {
        $this->menuItems[] = $newMenuItem;
    }
    
    function printMenu()
    {
        echo '<div id="menu">';
        foreach($this->menuItems as $menuItem)
        {  
            echo '<ul>';
            $menuItem->printMenuItem();
            echo '</ul>';
        }
        echo '</div>';
    }
}
?>