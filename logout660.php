<?php

require_once 'header635.php';
if(isset($_SESSION['user']))
{
	destroySession();
	echo "<div class='main'>You have been logged out .Please ".
	"<a href='index638.php'>click here</a> to refresh the screen.";
}
else echo "<div class='main'> <br>".
		"you can not logged out becoz you are not logged in ";

?>
<br><br></div>
</body>
</html>