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
            $menu = new MenuClass();
            $menu->addMenuItem(new MenuItemClass('Index', 'index.php', false));
            $menu->addMenuItem(new MenuItemClass('My Home', 'myHome.php', true));
            $menu->addMenuItem(new MenuItemClass('Current Planet', 'currentPlanet.php', false));
            $menu->addMenuItem(new MenuItemClass('Ship Actions', 'shipActions.php', false));
            if($user->isAdmin())
            {
              $menu->addMenuItem(new MenuItemClass('Admin Page', 'adminPage.php', false));
            }
            $menu->printMenu();
            $money = $user->getMoney();
            echo "<tr><td>Money</td><td>$money</td></tr>";
        ?>
    </table>
  </body>
</html>
