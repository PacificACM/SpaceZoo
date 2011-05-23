<?php
class UserClass
{
    private $user_id;
    function __construct($id)
    {
        if($id == 0)
        {
            die('You need to authorize the app or sign into facebook');
        }
        $db = new DatabaseClass();
        $result = mysql_query("SELECT user_id FROM user WHERE user_id = $id");
        $foundUser = mysql_numrows($result);
        $currentDateTime = date("Y-m-d H:i:s");
        if($foundUser == 0)
        {
            mysql_query("INSERT INTO user (user_id, firstSeen, lastSeen, currentPlanetID, xLocation, yLocation, thrusterLevel, scannerLevel, futureXLocation, futureYLocation, travelTimeLeftInMilliseconds) VALUES ('$id', '$currentDateTime', '$currentDateTime', -1, 0, 0, 1, 1, 0, 0, 0)");
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
    function getThrusterLevel()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT thrusterLevel FROM user WHERE user_id = $this->user_id");
        $row = mysql_fetch_assoc($result);
        return $row['thrusterLevel'];
    }
    function getScannerLevel()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT scannerLevel FROM user WHERE user_id = $this->user_id");
        $row = mysql_fetch_assoc($result);
        return $row['scannerLevel'];
    }
    function getFutureXLocation()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT futureXLocation FROM user WHERE user_id = $this->user_id");
        $row = mysql_fetch_assoc($result);
        return $row['futureXLocation'];
    }
    function getFutureYLocation()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT futureYLocation FROM user WHERE user_id = $this->user_id");
        $row = mysql_fetch_assoc($result);
        return $row['futureYLocation'];
    }
    function getTravelTimeLeftInMilliseconds()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT travelTimeLeftInMilliseconds FROM user WHERE user_id = $this->user_id");
        $row = mysql_fetch_assoc($result);
        return $row['travelTimeLeftInMilliseconds'];
    }
    function getScannerLevel()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT scannerLevel FROM user WHERE user_id = $this->user_id");
        $row = mysql_fetch_assoc($result);
        return $row['scannerLevel'];
    }
    function calculateTimeToMoveInSeconds($newXLocation, $newYLocation)
    {
        $currXLocation = $this->getXLocation();
        $currYLocation = $this->getYLocation();
        $currThrusterLevel = $this->getThrusterLevel();
        $distanceToTarget = MathClass::calculateDistance($currXLocation, $currYLocation, $newXLocation*1000, $newYLocation*1000);
        $startupTime = 100/$currThrusterLevel;
        return $startupTime + $distanceToTarget / $currThrusterLevel;
    }
    function moveToLocation($newXLocation, $newYLocation)
    {
        $timeToMove = $this->calculateTimeToMoveInSeconds($newXLocation, $newYLocation);
        
    }
}
?>