<?php
require_once 'SecretClass.php'
class UserClass
{
    function __construct($id)
    {
        $dbhost = 'localhost';
        $dbuser = SecretsClass::$dbUser;
        $dbpass = SecretsClass::$dbPassword;
        $dbname = 'spacezoo_main'
        $conn = mysql_connect($dbhost, $dbuser, $dbpass);
        mysql_select_db($dbname);
        //if user doesn't exist in db, then create
    }
}
?>