<!DOCTYPE HTML>
<html>
	<head>
		<script src='http://code.jquery.com/jquery.js'></script>

		<style type="text/css">
			span { width:50%; display:inline-block; }
    		span.align-right { text-align:right; }
		</style>

		<title>Remember People</title>
	</head>

	<body>

		<?php require "lib/db.php"; ?>

		<h1>Stay in contact - Who did you see today?</h1>

		<?php

if ($_GET["action"]) {
  $action = $_GET["action"])
  if ($action == "newuser") {
    addUser($_GET["name"])
  elseif($action == "newDescription") {
    addDescription($_GET["id"],$_GET["desc"])
  }
}

			$people = listPeople();

			foreach($people as $person) {
		?>


		<a href="bin"><span><?php echo $person[0]; ?></span><span class="align-right">Last Contact: <?php echo $person[1]; ?></span></a>
			<div>
				<p>Some inside content</p><br>
				<p>Lorem Ipsum yatta yatta</p><br>
			</div>
			<br>

		<?php } ?>


		<script>

			// I learn JQuery here
			$(document).ready(function(){

				$(".bin").click(function(){
					$(this).next().slideToggle("fast");
					return false;
				});


			});

		</script>


	</body>


</html>
