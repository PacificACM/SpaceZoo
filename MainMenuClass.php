<?php
class MainMenuClass
{
    private static $menu;
    private static function addMenuItemAuto($name, $file)
    {
        if($file == basename($_SERVER['REQUEST_URI'], ".php") . ".php")
        {
            $menu->addMenuItem(new MenuItemClass($name, $file, true));
        }
        else
        {
            $menu->addMenuItem(new MenuItemClass($name, $file, false));
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
        $menu->printMenu();
    }
}
?>