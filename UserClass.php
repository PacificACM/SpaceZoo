<?php
require_once 'SecretClass.php'
class UserClass
{
    private $user_id;
    function __construct($id)
    {
        $dbhost = 'localhost';
        $dbuser = SecretsClass::$dbUser;
        $dbpass = SecretsClass::$dbPassword;
        $dbname = 'spacezoo_main';
        $conn = mysql_connect($dbhost, $dbuser, $dbpass);
        mysql_select_db($dbname);
        $result = mysql_query('SELECT user_id FROM user WHERE user_id = ' . $id));
        $foundUser = mysql_numrows($result);
        $currentDateTime = date("Y-m-d H:i:s");
        if($foundUser == 0)
        {
            my_sql_query('INSERT INTO user (user_id, firstSeen, lastSeen) VALUES ($id, $currentDateTime, $currentDateTime)');
        }
        else
        {
            my_sql_query('UPDATE user SET lastSeen = ' . $currentDateTime . ' WHERE user_id = ' . $id);
        }
        mysql_close();
        $user_id = $id;
    }
    function getID()
    {
        return $user_id;
    }
}
?>