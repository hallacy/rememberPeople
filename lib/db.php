<?php


function addPerson($name) {
//TODO: ADdd transactions
// TODO add basic error wrapping
  $mysqli = new mysqli("localhost", "root", "raspberry", "rememberPeople");
  if (!$mysqli->query("INSERT INTO people (name) VALUES ('" . $name . "');")) {
    echo "Failed: " . $mysqli->error ;
  }
  $person_id = $mysqli->insert_id;
  if(!$mysqli->query("INSERT INTO last_interact(people_id,time_stamp) VALUES (" . $person_id . ", now())")) {
    echo "Failed: " . $mysqli->error ;
  }
}

function addDescription($id, $desc) {
  $mysqli = new mysqli("localhost", "root", "raspberry", "rememberPeople");
  $query = "INSERT INTO interactions (people_id,time_stamp,description)  VALUES ";
  $query .= "(" . $id . ", now(), '" . $desc . "')";
  if (!$mysqli->query($query)) {
    echo "Failed: " . $mysqli->error ;
  }
  return; 
}

function listPeople() {
  $mysqli = new mysqli("localhost", "root", "raspberry", "rememberPeople");
  $query = "SELECT id, name, time_stamp FROM people JOIN last_interact ON people.id=last_interact.people_id "; 
  $res =  $mysqli->query($query);
  $res->data_seek(0);
  $data = array();
  while ($row = $res->fetch_assoc()) {
    $data[$row['id']] = array($row['name'],$row['time_stamp']);
  }
  return $data;
}
?>
