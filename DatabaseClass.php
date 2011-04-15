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
    function mysql_query($string)
    {
        mysql_query($string);
    }
    function mysql_numrows($string)
    {
        mysql_numrows($string);
    }
}
?>