<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chatbox";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

$result1 = "SELECT * FROM logs ORDER BY id DESC";
$rows= mysqli_query($con, $result1);
function time_elapsed_string($datetime, $full = false) {
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'year',
		'm' => 'month',
		'w' => 'week',
		'd' => 'day',
		'h' => 'hour',
		'i' => 'minute',
		's' => 'second',
	);
	foreach ($string as $k => &$v) {
		if ($diff->$k) {
			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
		} else {
			unset($string[$k]);
		}
	}

	if (!$full) $string = array_slice($string, 0, 1);
	return $string ? implode(', ', $string) . ' ago' : 'just now';
}

//var_dump($rows);
while($extract = mysqli_fetch_array($rows, MYSQLI_ASSOC)) {
	//echo "<span>" . $extract['username'] . "</span>: <span>" . $extract['msg'] . "</span><br />";

	if (!function_exists('time_elapsed_string')) {
		function time_elapsed_string() { echo $extract['Time'];}
	}else {
		$jail = time_elapsed_string($extract['Time'], true);
	}

	echo <<<AOT
	<div class="list-group">
	<a href="#" class="list-group-item list-group-item-action active">
	{$extract['username']}</a>
	<li class="list-group-item d-flex justify-content-between align-items-center">
	{$extract['msg']}
	<span class="badge badge-primary badge-pill">{$jail}</span>
	</li>
	</div>
AOT;

}
