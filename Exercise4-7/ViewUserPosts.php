<?php
	$user_id = $_POST["users"];
	$sql = new mysqli("mysql.eecs.ku.edu","zachdelong","iedoh4ih","zachdelong");
	if ($sql->connect_errno) {
		printf("Connect failed: %s\n", $sql->connect_error);
		exit();
	}
	$postquery = "SELECT * FROM Posts WHERE author_id='$user_id'";
	echo "<table><thead><tr><th colspan='2'>Posts created by $user_id</th></tr><tr><th>post_id</th><th>Content</th></tr></thead>";
	if ($result = $sql->query($postquery)) {
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["post_id"] . "</td><td>" . $row["content"] . "</td></tr>";
		}
		$result->free();
	}
    echo "</tbody></table>";
    echo "<a href='ViewUserPosts1.php'>Return to selction</a>";
	$sql->close();
?>