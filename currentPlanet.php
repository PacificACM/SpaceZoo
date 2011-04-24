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
        $currentPlanet = $user->getCurrentPlanet();
        if($currentPlanet->isNull())
        {
            die('You are not on a planet');
        }
    ?>
    <table>
        <tr>
            <td>
                Planet: <?php echo $currentPlanet->getName() ?>
            </td>
        </tr>
        <tr>
            <td>
                Location: <?php echo $currentPlanet->getXLocation() ?>, <?php echo $currentPlanet->getYLocation() ?>
            </td>
        </tr>
    </table>
  </body>
</html>
