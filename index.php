<?php
/**
 *
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */


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

// We may or may not have this data based on a $_GET or $_COOKIE based session.
//
// If we get a session here, it means we found a correctly signed session using
// the Application Secret only Facebook and the Application know. We dont know
// if it is still valid until we make an API call using the session. A session
// can become invalid if it has already expired (should not be getting the
// session back in this case) or if the user logged out of Facebook.
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
