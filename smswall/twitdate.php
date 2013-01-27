<?php
/* Works out the time since the entry post, takes a an argument in unix time (seconds)
*/
function Timesince($original,$delay) {
    // array of time period chunks
    $chunks = array(
	array(60 * 60 * 24 * 365 , 'jaar'),
	array(60 * 60 * 24 * 30 , 'maand'),
	array(60 * 60 * 24 * 7, 'week'),
	array(60 * 60 * 24 , 'dag'),
	array(60 * 60 , 'uur'),
	array(60 , 'min'),
	array(1 , 'sec'),
    );

    $today = time(); /* Current unix time  */
    if(!empty($delay)){
    	$today = $today + $delay;
    }
    $since = $today - $original;

    // $j saves performing the count function each time around the loop
    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
	
		$seconds = $chunks[$i][0];
		$name = $chunks[$i][1];
	
		// finding the biggest chunk (if the chunk fits, break)
		if (($count = floor($since / $seconds)) != 0) {
		    break;
		}
    }
	
    //$pluriel = ($name != "mois") ? 's' : '';
    $pluriel = ($name == "min" || $name == "sec") ? '' : 'en';
	$name = ($count > 1 && $name == "jaar") ? 'jar' : "$name";
	$name = ($count > 1 && $name == "uur") ? 'ur' : "$name";
    $print = ($count == 1) ? '1 '.$name : "$count {$name}$pluriel";

	
    if ($i + 1 < $j) {
		// now getting the second item
		$seconds2 = $chunks[$i + 1][0];
		$name2 = $chunks[$i + 1][1];
	
		// add second item if its greater than 0
		if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0) {
			//$pluriel2 = ($name2 != "mois") ? 's' : '';
			$pluriel2 = ($name2 == "min" || $name2 == "sec") ? '' : 'en';
			$name2 = ($count2 > 1 && $name2 == "jaar") ? 'jar' : "$name2";
			$name2 = ($count2 > 1 && $name2 == "uur") ? 'ur' : "$name2";
		    $print .= ($count2 == 1) ? ', 1 '.$name2 : " $count2 {$name2}$pluriel2";
		}
    }
    return $print;
}
?>