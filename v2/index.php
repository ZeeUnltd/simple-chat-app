<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Chat Box</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
	<link rel="stylesheet" href="index.css">

</head>
<body class="container">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="#">Simple Chat-App</a>
	</nav>
		<form name="form1" >
			<div class="form-group">
				<span class="badge badge-pill badge-warning">Please open another window for the second chat </span>
				<fieldset ><br>
					<label class="control-label" >Enter Your Chatname:</label>
					<input type="text" id="uname"  class="form-control" placeholder="Enter Your Username"/>
					<label class="col-form-label col-form-label-lg" for="inputLarge">Message</label>
					<input class="form-control form-control-lg" type="text" placeholder="chat here..." id="msg"><br>
					<button type="submit" class="btn btn-primary">Send</button>
					<!-- <a href="#" onclick="submitChat()">Send</a> -->
				</fieldset>
			</div>

		</form>
		<div id="chatlogs">
			Loading Chatlog...
			<div class="progress">
				<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
			</div>
		</div>

		<script type="text/javascript" src="index.js"></script>

	</body>
