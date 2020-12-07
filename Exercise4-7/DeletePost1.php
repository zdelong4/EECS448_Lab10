<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
		<title>Delete Posts</title>
	</head>
	<body>
		<form action='DeletePost.php' method='post'>
				<table style="border:3px; border-style:solid; border-color:#FF0000; padding: 1em;">
					<thead>
						<tr><th>user_id</th><th>post_id</th><th>Content</th><th>DeletePost</th></tr>	
					</thead>
					<tbody>
						<?php
							$sql = new mysqli("mysql.eecs.ku.edu","zachdelong","iedoh4ih","zachdelong");
							if ($sql->connect_errno) {
								printf("Connect failed: %s\n",$sql->connect_error);
								exit();
							}
							if($userlst = $sql->query("SELECT * FROM Users WHERE true")){
								while($row = $userlst->fetch_assoc()){
									$userid = $row["user_id"];
									$postquery = "SELECT * FROM Posts WHERE author_id='$userid'";
									if($postlst = $sql->query($postquery)){
										while($row2 = $postlst->fetch_assoc()){
											$postid = $row2["post_id"];
											$content = $row2["content"];
											echo "<td>$userid</td><td>$postid</td><td>$content</td>";
											echo "<td><input type='checkbox' name='$postid'/></td></tr>";
										}
										$postlst->free();
									}
								}
								$userlst->free();
							}
							$sql->close();
						?>
					</tbody>
				</table>
				<input type='submit'/>
		</form>
		<a href="AdminHome.html">Back</a>
	</body>
</html>