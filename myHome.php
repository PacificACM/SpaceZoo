<!doctype html>
<?php
    require 'facebook-php-sdk/src/facebook.php';
    function __autoload($className) {
      include $className . '.php';
    }
    // Create our Application instance (replace this with your appId and secret).
    $facebook = new Facebook(array(
      'appId'  => '184154878290481',
      'secret' => SecretsClass::$secret,
      'cookie' => true,
    ));
    $session = $facebook->getSession();

    $me = null;
    // Session based API call.
    if ($session) {
      try {
        $uid = $facebook->getUser();
        $me = $facebook->api('/me');
      } catch (FacebookApiException $e) {
        error_log($e);
      }
    }
    
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
