<?php
include_once('database.php');
/*Select Query*/
	$shouts = mysql_query("Select * from shouts order by id DESC");
	
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Shout It Up</title>
<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
	<div id="container">
	<header>
		<h1>Shout It Up</h1>
	</header>	
		<div id="shouts">
			<ul>
				<?php
					while($row = mysql_fetch_assoc($shouts)):
				?>				
				<li class="shout"><span><?=$row['time']?> - </span><?=$row['user']?>: <?=$row['message']?></li>
				<?php endwhile; ?>
			</ul>
		</div>
		<div id="input">
			<?php 
				if(isset($_GET['err'])):
			?>
			<div class="error">
				<?=$_GET['err']?>
			</div>	
			<?php endif;?>
			<form method="post" action="process.php">
				<input type="text" name="user" id="user" placeholder="Your Name"/>
				<input type="text" name="message" id="message" placeholder="Your message"/>
				</br>
				<input class="shout-out" id="btnsub" type="submit" name="submit" value="Shout It Out"/>
			</form>
		</div>
	</div>
	
</body>
</html>