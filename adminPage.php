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
            
        ?>
        <form name="form1" method="" action="">
            <input type="text" value="xLocation">
            <input type="submit" name="Generate" value="Generate">
        </form>
    </table>
  </body>
</html>
