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
            if(!$user->isAdmin())
            {
                die("Not Admin");
            }
            MainMenuClass::show($user->isAdmin());
            if(isset($_POST['Generate']))
            {
                $seederClass = new UniverseSeederClass();
                $seederClass->addPlanetsToArea($_POST['xLocation1'],$_POST['yLocation1'],$_POST['xLocation2'],$_POST['yLocation2'],$_POST['numPlanets']);
            }
        ?>
        <form name="form1" method="post" action="adminPage.php">
            <input type="text" value="xLocation1" name="xLocation1">
            <input type="text" value="yLocation1" name="yLocation1">
            <input type="text" value="xLocation2" name="xLocation2">
            <input type="text" value="yLocation2" name="yLocation2">
            <input type="text" value="numPlanets" name="numPlanets">
            <input type="submit" name="Generate" value="Generate">
        </form>
        <?php
            $db = new DatabaseClass();
            $user_id = $user->getID();
            $result = mysql_query("SELECT user_id FROM user ORDER BY firstSeen");
            while($row = mysql_fetch_assoc($result))
            {
                $facebookUser = $facebook->api($row['user_id']);
                echo $facebookUser['name'];
                echo "<br />";
            }
        ?>
  </body>
</html>
