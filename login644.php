<?php

require_once 'header635.php';
echo "<div class='main'><h3> Please enter your details to log in</h3>";
$error =$user=$pass="";

if(isset($_POST['user']))
{	
	$user=sanitizeString($_POST['user']);
	$pass=sanitizeString($_POST['pass']);
	

	if($user==""||$pass=="")
		$error="Not all fields are entered<br>";
	else
	{
		$result=queryMysql("SELECT * FROM members where user='$user' AND pass='$pass'");
		if($result->num_rows==0)
		{	
			$error="<span class='error'>Username / Password invalid</span><br><br>";
		}

		else
		{
		$_SESSION['user']=$user;
		$_SESSION['pass']=$user;
		die("you are now logged in ,Please <a href='members651.php?view=$user'>".
			"click here</a> to continue.<br><br>");
		}

	}
}
echo <<<_END
	<form method='post' action='login644.php'>$error
	<span class='fieldname'>Username</span>
	<input type='text' maxlength='16' name='user' value='$user'><br>
	<span  class='fieldname'>Password</span>
	<input type='password' maxlength='16' name='pass' value='$pass'><br>
	
_END;
?>
<span class='fieldname'>&nbsp;</span>
<input type='submit' value='Login'>
</form></div><br>
</body>
</html>

