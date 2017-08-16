<!DOCTYPE html>
<html>
<head>
	<title>setting up database</title>
</head>
<body>
<h3>setting up ....</h3>
<?php
require_once 'functions633.php';

createTable('members','user VARCHAR(16),pass VARCHAR(16),INDEX(user(6))');
createTable('messages','id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,auth VARCHAR(16),recip VARCHAR(16),pm char(1),time INT UNSIGNED,message VARCHAR(4096),INDEX(auth(6)),INDEX(recip(6))');
createTable('friends','user VARCHAR(16),friend VARCHAR(16),INDEX(user(6)),INDEX(friend(6))');
createTable('profiles','user VARCHAR(16),text VARCHAR(4096),INDEX(user(6))');

?>
</body>
</html>

