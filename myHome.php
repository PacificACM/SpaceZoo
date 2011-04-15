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
            $menu = new MenuClass();
            $menu->addMenuItem(new MenuItemClass('Index', 'index.php', false));
            $menu->addMenuItem(new MenuItemClass('View Other Zoos', 'otherZoos.php', false));
            $menu->printMenu();
            $user = new UserClass($facebook->getUser());
            $money = $user->getMoney();
            echo "<tr><td>Money</td><td>$money</td></tr>";
        ?>
    </table>
  </body>
</html>
