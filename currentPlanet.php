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
    <?php
        $menu = new MenuClass();
        $menu->addMenuItem(new MenuItemClass('Index', 'index.php', false));
        $menu->addMenuItem(new MenuItemClass('My Home', 'myHome.php', false));
        $menu->addMenuItem(new MenuItemClass('Current Planet', 'currentPlanet.php', true));
        $menu->printMenu();
        $user = new UserClass($facebook->getUser());
        echo "Current planet info here";
    ?>
  </body>
</html>
