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
    <table>
        <tr>
            <td>
                Location: <?php echo $user->getXLocation() ?>, <?php echo $user->getYLocation() ?>
            </td>
        </tr>
    </table>
  </body>
</html>