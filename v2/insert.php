<?php

$uname = $_REQUEST['uname'];
$msg = $_REQUEST['msg'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chatbox";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}
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


$sql ="INSERT INTO logs (username, msg) VALUES ('$uname', '$msg')";
if (mysqli_query($con, $sql)) {
	echo "New record created successfully <br>";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

$result ="SELECT * FROM logs ORDER BY id DESC";

$row = mysqli_query($con, $result);
//printf ("%s (%s)\n", $row["username"], $row["msg"]);
while($extract = mysqli_fetch_array($row, MYSQLI_ASSOC)) {
	//"<span>" .  . "</span>: <span>" . $extract['msg'] . "</span><br />"
	if (!function_exists('time_elapsed_string')) {
		function time_elapsed_string() { echo $extract['Time'];}
	}else {
		$jail = time_elapsed_string($extract['Time'], true);
	}
	echo <<<AOT
	<div class="list-group">
	<a href="#" class="list-group-item list-group-item-action active">
		{$extract['username']}</a>
	<a href="#" class="list-group-item list-group-item-action disabled">{$extract['msg']}
	<span class="badge badge-primary badge-pill">{$jail}</span></a>
</div>
AOT;

}
