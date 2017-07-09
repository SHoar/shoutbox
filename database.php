<?php
// Connect to MySQL
$conn = mysqli_connect("localhost", "root", "LNFjE4sVpbbP", "shoutit");

// Test connection
if(mysqli_connect_errno()){
	echo 'Failed to connect to MySQL: '.mysqli_connect_error();
}

?>
