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
        $user = new UserClass($facebook->getUser());
        MainMenuClass::show($user->isAdmin());
        
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
        <tr>
            <td>
                Temperature Range: <?php echo $currentPlanet->getTempLow() ?>&deg;F - <?php echo $currentPlanet->getTempHigh() ?>&deg;F
            </td>
        </tr>
    </table>
  </body>
</html>
