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
        return mysql_query($string);
    }
    function mysql_numrows($string)
    {
        return mysql_numrows($string);
    }
    function mysql_close()
    {
        return mysql_close();
    }
    function mysql_fetch_assoc($string)
    {
        return mysql_fetch_assoc($string);
    }
}
?>