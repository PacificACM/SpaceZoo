<?php
class UserClass
{
    private $user_id;
    function __construct($id)
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT user_id FROM user WHERE user_id = $id");
        $foundUser = mysql_numrows($result);
        $currentDateTime = date("Y-m-d H:i:s");
        if($foundUser == 0)
        {
            mysql_query("INSERT INTO user (user_id, firstSeen, lastSeen, currentPlanetID) VALUES ('$id', '$currentDateTime', '$currentDateTime', -1)");
        }
        else
        {
            mysql_query("UPDATE user SET lastSeen = '$currentDateTime' WHERE user_id = $id");
        }
        $this->user_id = $id;
    }
    function getID()
    {
        return $this->user_id;
    }
    function getMoney()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT money FROM user WHERE user_id = $this->user_id");
        $row = mysql_fetch_assoc($result);
        return $row['money'];
    }
    function isAdmin()
    {
        if($this->user_id == 723845292)
        {
            return true;
        }
        return false;
    }
    function getCurrentPlanet()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT currentPlanetID FROM user WHERE user_id = $this->user_id");
        $row = mysql_fetch_assoc($result);
        $currPlanet = new PlanetClass($row['currentPlanetID']);
        return $currPlanet;
    }
    function getXLocation()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT xLocation FROM user WHERE user_id = $this->user_id");
        $row = mysql_fetch_assoc($result);
        return $row['xLocation']/1000;
    }
    function getYLocation()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT yLocation FROM user WHERE user_id = $this->user_id");
        $row = mysql_fetch_assoc($result);
        return $row['yLocation']/1000;
    }
}
?>