<?php
	include_once("database.php");
	if(isset($_POST['submit'])){
		$user = htmlspecialchars($_POST['user']);
		$message = htmlspecialchars($_POST['message']);
		$time = date("h:i:s");		
		
		if(!isset($user) || $user == "" || !isset($message) || $message == ""){
			$err = "Please, Enter a user and a message";
			header("Location:index.php?err=".urlencode($err));
			exit();
		}else{
			$query = "insert into shouts(user, message, time) values('$user', '$message', now())";
			mysql_query("$query");
			header("Location:index.php");
			exit();
		}
	}
?>