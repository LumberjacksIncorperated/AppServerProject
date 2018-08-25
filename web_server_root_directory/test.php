<!-- AUTHOR: Lumberjacks Incorperated (2018) -->

<!DOCTYPE html>
	<html>
		<body>
			<h1>My Application Webpage</h1>

				<?php

					
$mysqli = new mysqli("127.0.0.1", "root", "password", "my_application_database");


if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
//mysqli_real_escape_string

$result = $mysqli->query("SELECT * FROM messages");
if ($result) {
	var_dump($result->fetch_all());
	$result->close();
} else {
	echo 'trash';
}


$mysqli->close();

				?>

		</body>
	</html>
