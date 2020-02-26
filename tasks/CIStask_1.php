<?php
/**
 * Created by PhpStorm.
 * User: СевГУ
 * Date: 10.02.2020
 * Time: 12:38
 */
function numToTimeZone($num){
	$result = '';
	if ($num < 0){
		$result = $result . '-';
	} else {
		$result = $result . '+';
	}

	$absNum = abs($num);

	if ($absNum < 10) {
		$result = $result . '0';
	}

	$result = $result . $absNum . '00';
	return $result;
}

$format = 'd-m-Y H:i:s O';

$handle = fopen("input.txt", "r");
$buffer = fgets($handle);
$n = $buffer;
for ($i = 1; $i <= $n; $i++) {
    $buffer = fgets($handle);

    $spacedFragments = explode(" ", $buffer);
    $time1Fragments = explode("_", $spacedFragments[0]);
    $timeZone1 = $spacedFragments[1];
    $time2Fragments = explode("_", $spacedFragments[2]);
    $timeZone2 = $spacedFragments[3];

    $time1FullStr = $time1Fragments[0] . ' ' . $time1Fragments[1] . ' ' . numToTimeZone($timeZone1);
    $time2FullStr = $time2Fragments[0] . ' ' . $time2Fragments[1] . ' ' . numToTimeZone($timeZone2);

    /*var_dump($spacedFragments);
    echo '<br/>';
    var_dump($time1Fragments);
    echo '<br/>';
    var_dump($timeZone1);
    echo '<br/>';
    var_dump($time2Fragments);
    echo '<br/>';
    var_dump($timeZone2);
    echo '<br/>';
    var_dump($time1FullStr);
    echo '<br/>';
    var_dump($time2FullStr);
    echo '<br/>';*/

	$format = 'd.m.Y H:i:s O';
	$time1 = DateTime::createFromFormat($format, $time1FullStr);
	$time2 = DateTime::createFromFormat($format, $time2FullStr);

	$difference = $time2->getTimestamp() - $time1->getTimestamp();

	echo $difference . '<br/>';
}
fclose($handle);
?>