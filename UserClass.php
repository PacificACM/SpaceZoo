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
        return $row['futureXLocation']/1000;
    }
    function getFutureYLocation()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT futureYLocation FROM user WHERE user_id = $this->user_id");
        $row = mysql_fetch_assoc($result);
        return $row['futureYLocation']/1000;
    }
    function getTravelStartedTime()
    {
        $db = new DatabaseClass();
        $result = mysql_query("SELECT travelStartedTime FROM user WHERE user_id = $this->user_id");
        $row = mysql_fetch_assoc($result);
        return $row['travelStartedTime'];
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
    function setLocationToMove($newXLocation, $newYLocation)
    {
        $this->setFutureXLocation($newXLocation);
        $this->setFutureYLocation($newYLocation);
    }
    function makeMove()
    {
        $this->setTravelStartedTime(TimeClass::getCurrMicroTimeAsBigInt());
    }
    function getTravelMicroTimeLeft()
    {
        $timeTraveled = TimeClass::getCurrMicroTimeAsBigInt() - $this->getTravelStartedTime();
        $timeNeededToTravel = $this->calculateTimeToMoveInSeconds($this->getFutureXLocation(), $this->getFutureYLocation());
        $timeNeededToTravelInMicro = $timeNeededToTravel*1000000;
        $travelTimeLeft = $timeNeededToTravelInMicro - $timeTraveled;
        return $travelTimeLeft;
    }
    function isTraveling()
    {
        $travelTimeLeft = $this->getTravelMicroTimeLeft();
        if($travelTimeLeft <= 0)
        {
            $this->setXLocation($this->getFutureXLocation());
            $this->setYLocation($this->getFutureYLocation());
            return false;
        }
        return true;
    }
    function getStringLocation()
    {
        $stringLocation = "(" . $this->getXLocation() . ", " . $this->getYLocation() . ")";
        return $stringLocation;
    }
    function getStringFutureLocation()
    {
        $stringFutureLocation = "(" . $this->getFutureXLocation() . ", " . $this->getFutureYLocation() . ")";
        return $stringFutureLocation;
    }
    private function setXLocation($xLocation)
    {
        $db = new DatabaseClass();
        $futureXLocationAsInt = $futureXLocation*1000;
        mysql_query("UPDATE user SET xLocation = $xLocation WHERE user_id = $this->user_id");
    }
    private function setYLocation($yLocation)
    {
        $db = new DatabaseClass();
        $futureYLocationAsInt = $futureYLocation*1000;
        mysql_query("UPDATE user SET yLocation = $yLocation WHERE user_id = $this->user_id");
    }
    private function setFutureXLocation($futureXLocation)
    {
        $db = new DatabaseClass();
        $futureXLocationAsInt = $futureXLocation*1000;
        mysql_query("UPDATE user SET futureXLocation = $futureXLocationAsInt WHERE user_id = $this->user_id");
    }
    private function setFutureYLocation($futureYLocation)
    {
        $db = new DatabaseClass();
        $futureYLocationAsInt = $futureYLocation*1000;
        mysql_query("UPDATE user SET futureYLocation = $futureYLocationAsInt WHERE user_id = $this->user_id");
    }
    private function setTravelStartedTime($travelStartedTime)
    {
        $db = new DatabaseClass();
        mysql_query("UPDATE user SET travelStartedTime = $travelStartedTime WHERE user_id = $this->user_id");
    }
}
?>