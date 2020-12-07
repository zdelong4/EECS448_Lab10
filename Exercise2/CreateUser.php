<?php
	$user_id = $_POST["username"];
	$users = new mysqli("mysql.eecs.ku.edu","zachdelong","iedoh4ih","zachdelong");
	if ($users->connect_errno) {
		printf("Connect failed: %s\n", $users->connect_error);
		exit();
	}
	$query = "INSERT INTO Users VALUES ('$user_id')";
	if ($users->query($query)) {
		echo "<p>Account created!</p><br /";
	} else {
		echo "<p>The chosen username is unavailible.</p><br />";
		echo "<a href='CreateUser.html'>Return to register</a>";
	}
	$users->close();
?>