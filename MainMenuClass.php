<?php
class MainMenuClass
{
    private static $menu;
    private static function addMenuItemAuto($name, $file)
    {
        if("" == basename($_SERVER['REQUEST_URI'], ".php") || strlen(strchr(basename($_SERVER['REQUEST_URI'], ".php"),"?")) > 40)
        {
            if($name == Index)
            {
                MainMenuClass::$menu->addMenuItem(new MenuItemClass($name, $file, true));
            }
            else
            {
                MainMenuClass::$menu->addMenuItem(new MenuItemClass($name, $file, false));
            }
        }
        else
        {
            if($file == basename($_SERVER['REQUEST_URI'], ".php") . ".php")
            {
                MainMenuClass::$menu->addMenuItem(new MenuItemClass($name, $file, true));
            }
            else
            {
                MainMenuClass::$menu->addMenuItem(new MenuItemClass($name, $file, false));
            }
        }
    }
    static function show($isAdmin)
    {
        MainMenuClass::$menu = new MenuClass();
        MainMenuClass::addMenuItemAuto('Index', 'index.php');
        MainMenuClass::addMenuItemAuto('My Home', 'myHome.php');
        MainMenuClass::addMenuItemAuto('Current Planet', 'currentPlanet.php');
        MainMenuClass::addMenuItemAuto('Ship Actions', 'shipActions.php');
        if($isAdmin)
        {
            MainMenuClass::addMenuItemAuto('Admin Page', 'adminPage.php');
        }
        MainMenuClass::$menu->printMenu();
    }
}
?>