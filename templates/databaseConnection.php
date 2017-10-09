<?php 

	$dbc = mysqli_connect('localhost', 'root', '', 'bookLibrary');
	if(!$dbc){
		die("Could not connect to database");
	} else {
		var_dump("connection is good");
	}