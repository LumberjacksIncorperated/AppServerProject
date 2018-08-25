<!-- AUTHOR: Lumberjacks Incorperated (2018) -->

<!DOCTYPE html>
	<html>
		<body>
			<h1>My Application Webpage</h1>

				<?php

					echo '
							<form action="/thing.php">
  							First name:<br>
  							<input type="text" name="firstname" value="'.$_REQUEST['firstname'].'">
 			 				<br>
  							Last name:<br>
  							<input type="text" name="lastname" value="'.$_REQUEST['lastname'].'">
  							<br><br>
  							<input type="submit" value="Submit">
							</form> 
						';

					var_dump($_REQUEST);

				?>

		</body>
	</html>
