<?php
    require 'facebook-php-sdk/src/facebook.php';
    if("" == basename($_SERVER['REQUEST_URI'], ".php")) {
        $app_id = "184154878290481";
    
        $canvas_page = "http://apps.facebook.com/spacezoo/";
    
        $auth_url = "http://www.facebook.com/dialog/oauth?client_id=" 
               . $app_id . "&redirect_uri=" . urlencode($canvas_page);
    
        $signed_request = $_REQUEST["signed_request"];
    
        list($encoded_sig, $payload) = explode('.', $signed_request, 2); 
    
        $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
    
        if (empty($data["user_id"])) {
            echo("<script> top.location.href='" . $auth_url . "'</script>");
            die();
        }
    }
    
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