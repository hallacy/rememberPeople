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

if (array_key_exists("action", $_GET)) {
  $action = $_GET["action"];
  if ($action == "newUser") {
    addPerson($_GET["name"]);
  } elseif($action == "newDescription") {
    addDescription($_GET["id"],$_GET["desc"]);
  }
}

			$people = listPeople();

			foreach($people as $id=>$person) {
		?>

	<div class="accordion">
	  <a href class="bin"><span><?php echo $person[0]; ?></span><span class="align-right">Last Contact: <?php echo $person[1]; ?></span></a>
	<div>
        <form>
          New Event: <input type="textarea" name="desc"/>
          <input type="submit" value="submit"/>
          <input type="hidden" name="id" value=<?=$id?> />
          <input type="hidden" name="action" value="newDescription"/>
        </form>
        <br>
        <h3>Past Interactions</h3>
        <?php foreach($person[2] as $event) { ?>
        <div>Date: <?php echo $event[0]; ?>
        <p>Description: <?php echo $event[1]; ?></p>
        </div>

        <?php } ?>

	</div>
	</div>
	<br>

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


	<h2>Add a new person:</h2>	
	<form>
	  <input type="hidden" name="action" value="newUser"/>
	  <input type="text" name="name"/>
	  <input type="submit" value="submit"/>
	</form>

	</body>


</html>
