<?php
class MathClass
{
    static function gcm($a, $b)
    {
	return ( $b == 0 ) ? ($a):( MathClass::gcm($b, $a % $b) );
    }
    static function lcm($a, $b)
    {
	    return ( $a / MathClass::gcm($a,$b) ) * $b;
    }
    static function lcmArr($arr)
    {
        if (count($arr) > 1)
        {
	    $arr[] = MathClass::lcm( array_shift($arr) , array_shift($arr) );
            return lcmArr( $arr );
	}
        else
        {
	    return $arr[0];
	}
    }
    static function sumElementsInArr($arr)
    {
        $rarityTotal = 0;
        for($i = 0; $i < count($arr); $i++)
        {
            $rarityTotal += $arr[$i];
        }
        return $rarityTotal;
    }
    static function getNormallyDistributedRand()
    {
	$randFloat1 = mt_rand()/mt_getrandmax();
        $randFloat2 = mt_rand()/mt_getrandmax();
        $normallyDistributedRand = sqrt(-2*log($randFloat1))*cos(2*pi()*$randFloat2);
	return $normallyDistributedRand;
    }
    static function calculateDistance($x1, $y1, $x2, $y2)
    {
	$xDiff = $x1 - $x2;
	$yDiff = $y1 - $y2;
	return sqrt($xDiff*$xDiff + $yDiff*$yDiff);
    }
}
?>