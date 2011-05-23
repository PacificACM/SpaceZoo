<?php
class TimeClass
{
    static function getCurrTimeAsBigInt()
    {
        $timeOfDayArr = gettimeofday();
        return $timeOfDayArr['sec']*1000000 + $timeOfDayArr['usec']
    }
}
?>