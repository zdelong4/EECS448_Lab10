<?php
	$user_id = $_POST["username"];
	$content = $_POST["content"];
	$sql = new mysqli("mysql.eecs.ku.edu","zachdelong","iedoh4ih","zachdelong");
	if ($sql->connect_errno) {
		printf("Connect failed: %s\n", $sql->connect_error);
		exit();
	}
	$userquery = "SELECT * FROM Users WHERE user_id='$user_id'";
	if ($sql->query($userquery)->num_rows) {
		$postquery = "INSERT INTO Posts (content,author_id) VALUES ('$content','$user_id')";
		if ($sql->query($postquery)) {
			echo "<p>Your message has been successfully posted!</p><br />";
			echo "<a href='CreatePosts.html'>Return to create posts</a>";
		} else {
			echo "<p>Error: " . $sql->error . "";
		}
	} else {
		echo "<p>The entered username does not exist</p><br />";
		echo "<a href='CreatePosts.html'>Return to create posts</a>";
	}

?>