<?php
require 'facebookIncludes.php';
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>SpaceZoo</title>
    <link rel="stylesheet" type="text/css" href="default.css" /> 
  </head>
  <body>
    <h1 style = "text-align: center;">Space Zoo</h1>
    <?php
      $menu = new MenuClass();
      $menu->addMenuItem(new MenuItemClass('My Home', 'myHome.php', false));
      $menu->addMenuItem(new MenuItemClass('View Other Zoos', 'otherZoos.php', false));
      $menu->printMenu();
      $currentUser = new UserClass($facebook->getUser());
      echo ("Welcome User: " . $currentUser->getID());
    ?>
  </body>
</html>
