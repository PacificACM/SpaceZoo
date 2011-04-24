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
      $user = new UserClass($facebook->getUser());
      MainMenuClass::show($user->isAdmin());
      echo ("Welcome User: " . $user->getID());
    ?>
  </body>
</html>
