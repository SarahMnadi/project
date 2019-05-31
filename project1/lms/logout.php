<?php
	include("session.php");
	include("config.php");
	session_destroy();
	header("location: home.php");
?>