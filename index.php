<?php include 'database.php' ; ?>
<?php 
ini_set(display_errors, 'on');
error_reporting(E_ALL);
	// Create Select Query
	$query = "SELECT * FROM shouts";
	$shouts = mysqli_query($conn, $query);
	$error = isset($array["error"]) ? $array["error"]: "";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <title>SHOUT IT!</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        <div id="container">
  	      <header>
		    <h1>SHOUT IT! Shoutbox</h1>
		</header>
		<div id="shouts">
			<ul>
				<?php while($row = mysqli_fetch_assoc($shouts)) : ?>
					<li class="shout"><span><?php echo $row['time'] ?> - </span><strong><?php echo $row['user'] ?>:</strong> <?php echo $row['message'] ?></li>	
				<?php endwhile; ?> 
			</ul>	
		</div>
		<div id="input"> 
			<?php if(isset($_GET["error"])) : ?>
				<div class="error"><?php echo $_GET["error"]; ?></div>
			<?php endif; ?>
			<form method="post" action="process.php">
				<input type="text" name="user" placeholder="Enter Your Name" />
				<input type="text" name="message" placeholder="Type Your Message Here" />
				<hr />
				<input type="submit" name="submit" value="Shout It Out" class="shout-btn"/>
			</form>
		</div>
	</div>
    </body>

</html>

