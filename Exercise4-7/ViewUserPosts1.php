<html>
	<head>
		<meta charset='utf-8' />
		<title>View User Posts</title>
	</head>
	<body>
		<form action="ViewUserPosts.php" method="post">
			<p>Select a user to view thier posts:</p>
            <select name='users'>
					<?php
						$sql = new mysqli("mysql.eecs.ku.edu","zachdelong","iedoh4ih","zachdelong");
						if ($sql->connect_errno) {
							printf("Connect failed: %s\n",$sql->connect_error);
							exit();
						}
						if($result = $sql->query("SELECT * FROM Users WHERE true")){
							while ($row = $result->fetch_assoc()) {
								$name = $row["user_id"];
								echo "<option value='$name'>$name</option>";
							}
							$result->free();
						}
						$sql->close();
					?>
				</select>
				<input type="submit" />
		</form>
		<a href="AdminHome.html">Back</a>
	</body>
</html>
