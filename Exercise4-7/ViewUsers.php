<?php
	$sql = new mysqli("mysql.eecs.ku.edu","zachdelong","iedoh4ih","zachdelong");
	if ($sql->connect_errno) {
		printf("Connect failed: %s\n", $sql->connect_error);
		exit();
	}
	$userquery = "SELECT * FROM Users WHERE true";
	echo "<table><thead><tr><th>user_id</th></tr></thead>";
	if ($result = $sql->query($userquery)) {
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["user_id"] . "</td></tr>";
		}
		$result->free();
	}
	echo "</tbody></table>";
	echo "<a href='AdminHome.html'>Back</a>";
	$sql->close();
?>