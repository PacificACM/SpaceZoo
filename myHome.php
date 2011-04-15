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
    This is your home zoo! Go back to <a href='index.php'>index</a>
    <table>
        <?php
            $user = new UserClass($facebook->getUser());
            $money = $user->getMoney();
            echo "<tr><td>Money</td><td>$money</td></tr>";
        ?>
    </table>
  </body>
</html>
