<?php 
include 'database.php';
include 'index.php';

ini_set(display_errors, 'on');

// Check if form submitted
if(isset($_POST['submit'])){
  $user = mysqli_real_escape_string( $conn, $_POST['user']);
  $message = mysqli_real_escape_string( $conn, $_POST['message']);
}
  // Set Timezone

  date_default_timezone_set('America/New_York');
  $time = date('h:i:s a', time());
  
// Validate input
  if( !isset($user) || $user == '' || !isset($message) || $message == '' ){
    $error = "Please fill-in your name and a message";
    header("Location: index.php?error=".urlencode($error));
    exit(); 
  } else {
    $query = "INSERT INTO shouts (user, message, time)
	VALUES ('$user', '$message', '$time')";
    if (!mysqli_query($conn, $query)){
      die('Error: '.mysqli_error($conn, $query));  
    } else {
        header("Location: index.php");
        exit();
    }
  }

