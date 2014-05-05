<!DOCTYPE HTML>
<html>
	<head>
		<script src='http://code.jquery.com/jquery.js'></script>
		<link rel="stylesheet" type="text/css" href="css/styles.css">

		<title>Remember People</title>
	</head>

	<body>

		<?php require "lib/db.php"; ?>

		<h1>Stay in contact - Who did you see today?</h1>

		<?php

			$people = listPeople();

			foreach($people as $person) {
		?>

		<div class="accordion">
			<a href class="bin"><span><?php echo $person[0]; ?></span><span class="align-right">Last Contact: <?php echo $person[1]; ?></span></a>
				<div>
					<p>Some inside content</p><br>
					<p>Lorem Ipsum yatta yatta</p>
				</div>
				<br>
		</div>

		<?php } ?>


		<script>

			// I learn JQuery here
			$(document).ready(function(){

				$(".bin").next().hide();

				$(".bin").click(function(){
					$(this).next().slideToggle("fast");
					return false;
				});


			});

		</script>


	</body>


</html>