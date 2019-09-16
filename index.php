<?php 
	$path = realpath(__DIR__);
	include $path."/classes/Shout.php";
	$shout = new Shout();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		This is just shouting box project
	</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
	<div class="wrapper clr">
		<header class="headsection clr">
			<h2>Basic shoutbox with PHP OPP & MySQLi</h2>
		</header>
		<section class="content clr">
			<div class="box">
				<ul>
					<?php 
						$getData = $shout->getAllData();
						if ($getData) {
							while ($data = $getData->fetch_assoc()){ ?> 
							<li><span><?php echo $data['time']; ?></span> - <b><?php echo $data['name']; ?></b><?php echo $data['body'];?> </li>
						
					<?php } } ?>
					
				</ul>
			</div>
			<?php 
				if($_SERVER["REQUEST_METHOD"] == 'POST'){
					$shoutdata = $shout->insertData($_POST);
				}
			 ?>
			<div class="shoutform clr">
				<form action="" method="post">
					<table>
						<tr>
							<td>Name</td>
							<td>:</td>
							<td><input type="text" name="name" required placeholder="please enter your name"></td>
						</tr>
						<tr>
							<td>body</td>
							<td>:</td>
							<td><input type="text" name="body" required placeholder="please enter your text"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><input type="submit" name="shout It"></td>
						</tr>
					</table>
				</form>
			</div>
		</section>
		<footer class="footsection clr">
			<h2>&copy: Copyright Training with live project.</h2>
		</footer>
	</div>
</body>
</html>