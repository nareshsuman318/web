<?php

require_once 'header635.php';
echo <<<_END
<script>
	function checkUser(user)
	{
		if(user.value=='')
		{
			O('info').innerHTML=''
			return
		}

		params="user="+ user.value
		request=new ajaxRequest()

		request.open("POST","checkuser643.php",true)
		request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
		request.setRequestHeader("Content-length",params.length)
		request.setRequestHeader("Connection","close")

		request.onreadystatechange=function()
		{
			if(this.readyState==4)
			{
				if(this.status==200)
				{
					if(this.responseText!=null)
					{
						O('info').innerHTML=this.responseText
					}
					else alert("Azax error:no data received")
				}
				else alert("Azax error:"+this.statusText)
			}
		}
		request.send(params)
	}
		function ajaxRequest()
		{
			try
			{
				var request=new XMLHttpRequest()
			}
			catch(e1)
			{
				try
				{
					request=new ActiveXObject("Msxml2.XMLHTTP")
				}
				catch(e2)
				{
					try
					{
						request=new ActiveXObject("Microsoft.XMLHTTP")
					}
					catch(e3)
					{
						request=false
					}
				}
			}
			return request
		}
	</script>
	<div class='main'><h3>please enter your details to sign up<h3>
_END;

$error =$user=$pass="";
if(isset($_SESSION['user'])) destroySession();
echo htmlentities("'" );

if(isset($_POST['user']))
{	
	$user=sanitizeString($_POST['user']);
	$pass=sanitizeString($_POST['pass']);
	

	if($user==""||$pass=="")
		$error="Not all fields are entered<br>";
	else
	{
		$result=queryMysql("SELECT * FROM members where user='$user'");

		
		if($result->num_rows)
		{	
			$row=$result->fetch_array(MYSQL_NUM);
		
			$error="that lllusername already exist<br>";
		}
		else
		{
			queryMysql("INSERT INTO members VALUES('$user','$pass')");
			die("<h4>Account created </h4> please log in");
		}
	}
}

echo <<<_END
	<form method='post' action='signup640.php'>$error
	<span class='fieldname'>Username</span>
	<input type='text' maxlength='16' name='user' value='$user' onBlur='checkUser(this)'><span id='info'></span><br>
	<span  class='fieldname'>password</span>
	<input type='password' maxlength='16' name='pass' value='$pass'><br>

	
_END;
?>

<span class='fieldname'>&nbsp;</span>
<input type='submit' value='Sign up'>

</form></div><br>
</body>
</html>