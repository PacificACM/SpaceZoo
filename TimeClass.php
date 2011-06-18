<?php
class TimeClass
{
    static function getCurrMicroTimeAsBigInt()
    {
        $timeOfDayArr = gettimeofday();
        return $timeOfDayArr['sec']*1000000 + $timeOfDayArr['usec'];
    }
}
?>