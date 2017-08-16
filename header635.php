<?php

session_start();
echo "<html><head>";
require_once 'functions633.php';
$userstr='( Guest)';

if(isset($_SESSION['user']))
{	
	$user=$_SESSION['user'];
	$loggedin=TRUE;
	$userstr='( '.$user.')';
}
else 
$loggedin=FALSE;
echo "<title>$appname$userstr</title><link rel='stylesheet'".
	"href=style662.css type='text/css'>".
	"</head><body><center><canvas id='logo' width='620'".
	"height='100'>$appname</canvas></center>".
	"<div class='appname'>$appname$userstr</div>" .
	"<script src='javascript664.js'></script>";
if($loggedin)
echo ("<br ><ul class='menu'>" .
	"<li><a href='members651.php?view=$user'>Home</a></li>".
	"<li><a href='members651.php'>Members</a></li>".
	"<li><a href='friends654.php'>Friends</a></li>".
	"<li><a href='messages657.php'>Messages</a></li>".
	"<li><a href='profile647.php'>Edit Profile</a></li>".
	"<li><a href='logout660.php'>Log Out</a></li></ul><br>");
else 
	echo ("<br><ul class='menu' >".
		"<li><a href='index638.php'>Home</a></li>".
		"<li><a href='signup640.php'>Sign up</a></li>".
		"<li><a href='login644.php'>Log in</a></li></ul><br>".
		"<span class='info'>&#8658; You are must be loged in to ".
		"view ths page.</span><br><br>"); 

?>