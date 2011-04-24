<?php
class MathClass
{
    static function gcm(a, b)
    {
	return ( b == 0 ) ? (a):( gcm(b, a % b) );
    }
    static function lcm(a, b)
    {
        return ( a / gcm(a,b) ) * b;
    }
    static function lcmArr($arr)
    {
        if (count($arr) > 1)
        {
	    $arr[] = lcm( array_shift($arr) , array_shift($arr) );
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
}
?>