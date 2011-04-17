<!doctype html>
<?php
    require 'facebookIncludes.php';
?>

<html xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
    <title>SpaceZoo</title>
    <link rel="stylesheet" type="text/css" href="default.css" /> 
  </head>
  <body>
    <h1 style = "text-align: center;">Space Zoo</h1>

    <table>
        <?php
            $user = new UserClass($facebook->getUser());
            if(!$user->isAdmin())
            {
                die("Not Admin");
            }
            $menu = new MenuClass();
            $menu->addMenuItem(new MenuItemClass('Index', 'index.php', false));
            $menu->addMenuItem(new MenuItemClass('My Home', 'myHome.php', false));
            $menu->addMenuItem(new MenuItemClass('Current Planet', 'currentPlanet.php', false));
            $menu->addMenuItem(new MenuItemClass('Admin Page', 'adminPage.php', true));
            $menu->printMenu();
            if(isset($_POST['Generate']))
            {
                $seederClass = new UniverseSeederClass();
                $seederClass->addPlanetsToArea($_POST['xLocation1'],$_POST['yLocation1'],$_POST['xLocation2'],$_POST['yLocation2'],$_POST['numPlanets']);
            }
        ?>
        <form name="form1" method="post" action="adminPage.php">
            <input type="text" value="xLocation1" name="xLocation1">
            <input type="text" value="yLocation1" name="yLocation1">
            <input type="text" value="xLocation2" name="xLocation2">
            <input type="text" value="yLocation2" name="yLocation2">
            <input type="text" value="numPlanets" name="numPlanets">
            <input type="submit" name="Generate" value="Generate">
        </form>
    </table>
  </body>
</html>
