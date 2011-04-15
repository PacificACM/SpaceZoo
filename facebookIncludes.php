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
        die($e);
      }
    }
?>