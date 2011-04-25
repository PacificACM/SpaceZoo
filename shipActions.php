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
    ?>
    <br />
    <br />
    <br />
    <table class="main">
        <tr>
            <th colspan=2>
                Ship Info
            </th>    
        </tr>
        <tr>
            <td>
                Location:
            </td>
            <td>
                <?php echo $user->getXLocation() ?>, <?php echo $user->getYLocation() ?>
            </td>
        </tr>
        <tr>
            <td>
                Thruster Level: 
            </td>
            <td>
                <?php echo $user->getThrusterLevel() ?>
            </td>
        </tr>
        <tr>
            <td>
                Scanner Level: 
            </td>
            <td>
                <?php echo $user->getScannerLevel() ?>
            </td>
        </tr>
    </table>
    <br />
    <br />
    <table class="main">
        <tr>
            <th>
                Move
            </th>
        </tr>
        <tr>
            <td>
                XLocation: <input type="text" name="xLocation"> YLocation: <input type="text" name="yLocation">
            </td>
        </tr>
    </table>
  </body>
</html>