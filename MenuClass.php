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
        echo '<div style="width: 100%; background: #fff; float: left;">';
        
        foreach($this->menuItems as $menuItem)
        {
            
            echo '<ul style="list-style: none; margin: 0; padding: 0; width: 12em; float: left;">';
            echo '<h2 style="font: bold 11px/16px arial, helvetica, sans-serif; display: block; border-width: 1px; border-style: solid; border-color: #ccc #888 #555 #bbb; margin: 0; padding: 2px 3px;">';
            $menuItem->printMenuItem();
            echo '</h2></ul>';
        }
        echo '</div>';
    }
}
?>