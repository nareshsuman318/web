<?php
require_once 'functions633.php';

if(isset($_POST['user']))
{
	$user=sanitizeString($_POST['user']);
	$result=queryMysql("SELECT * FROM members WHERE user='$user'");
	if($result->num_rows)
		{
			echo "<span class='taken'>&nbsp;&#x2718;".
				"this username is taken</span>";
	}
	else
	{
		echo "<span class='available'>&nbsp;&#x2714;".
	"this username is available</span>";
	}
}


?>