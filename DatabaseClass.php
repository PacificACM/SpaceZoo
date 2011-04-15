<?php
class DatabaseClass
{ 
    function __construct()
    {
        $dbhost = 'localhost';
        $dbuser = SecretsClass::$dbUser;
        $dbpass = SecretsClass::$dbPassword;
        $dbname = 'spacezoo_main';
        $conn = mysql_connect($dbhost, $dbuser, $dbpass);
        mysql_select_db($dbname);
    }
}
?>