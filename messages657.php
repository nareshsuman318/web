<?php
require_once 'header635.php';

if(!$loggedin) die();


if(isset($_GET['view']))
	$view=sanitizeString($_GET['view']);
else $view=$user;
echo $view;
echo $user;
if(isset($_POST['text']))
{
	$text=sanitizeString($_POST['text']);

	if($text!="")
	{
		$pm=substr(sanitizeString($_POST['pm']),0,1);
		$time=time();
		echo $view;
		queryMysql("INSERT INTO messages VALUES(NULL,'$user','$view','$pm',$time,'$text')");

	}
}
echo $view;
if($view!="")
{
	if($view==$user) $name1=$name2="your";
	else{
		$name1="<a href='members651.php?view=$view'>$view</a>'s";
		$name2="view's";
	}

	echo "<div class ='main' ><h3>$name1 messages</h3>";
	showProfile($view);

	echo <<<_END
	<form method='post' action ='messages657.php?view=$view'>
	type here to leave message :<br>
	<textarea name='text' cols='30' rows='4'></textarea><br>
	Public<input type='radio' name='pm' value='0' >
	Private<input type='radio' name='pm' value='1'checked='checked'>
	<input type='submit' value='Post message'></form><br>
_END;
	if(isset($_GET['erase']))
	{
		$erase=sanitizeString($_GET['$erase']);
		queryMysql("DELETE FROM messages WHERE id='erase' AND recip='$user'");
	}
echo $view;
	$query="SELECT * FROM messages WHERE recip='$view' OR recip='$user' ORDER BY time DESC";
	echo $view;
	$result=queryMysql($query);
	$num=$result->num_rows;
	echo $num;
	for($j=0;$j<$num;++$j)
	{
		$row=$result->fetch_array(MYSQLI_ASSOC);
		if($row['pm']==0||$row['auth']==$user||$row['recip']==$user)
		{	echo $num;
			echo date('M jS \'y g:ia:',$row['time']);
			echo "<a href='meassages657.php?view=" .$row['auth'] ."'>".$row['auth']."</a>";
			if($row['pm']==0)
				echo "wrote:&quot;".$row['message']."&quot;";
			else
				echo "whispered:<span class='whisper'>&quot;".$row['message']."&quot;</span>";
			if($row['recip']==$user)
				echo "[<a href='meassages.php?view=$view" . "&erase=" .$row['id']. "'>erase</a>]";

			echo "<br>";

		}
	}

}

if(!$num) echo "<br><span class='info'> no messages yet </span><br><br>";  
echo "<br><a class='button' href='messages657.php?view=$view'>Refresh messages</a>";
?>
</div><br>
</body>
</html>