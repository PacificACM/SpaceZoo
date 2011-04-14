<?php
require_once 'MenuItemClass.php';
class Menu
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
        foreach($this->menuItems as $menuItem)
        {
            $menuItem->printMenuItem();
            echo '<br />';
        }
    }
}
?>