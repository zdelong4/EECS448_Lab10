<?php
	$sql = new mysqli("mysql.eecs.ku.edu","zachdelong","iedoh4ih","zachdelong");
	if ($sql->connect_errno) {
		printf("Connect failed: %s\n", $sql->connect_error);
		exit();
	}
	if ($result = $sql->query("SELECT * FROM Posts WHERE true")) {
		while ($row = $result->fetch_assoc()) {
			$postid = $row["post_id"];
			$shoulddelete = $_POST["$postid"];
			if ($shoulddelete) {
				if ($sql->query("DELETE FROM Posts WHERE post_id='$postid'")) {
					echo "<p>post $postid has been deleted.</p>";
				} else {
					echo "<p>Error: post $postid was unable to be deleted</p>";
				}
			}
		}
		$result->free();
	}
	echo "<a href='DeletePost1.php'>Return to Delete Posts</a>";
	$sql->close();
?>