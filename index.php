<?php 
include('./config.php');

if (isset($_GET['input']) && $_GET['input'] = 'true'){
  $date = date('Y.m.d H:i:s');
  $humidity = $_GET['humidity'];
  $temperature = $_GET['temperature'];
  $sql = "INSERT INTO meto_station VALUES '' ,$date', '$humidity', '$temperature';";
  if ($db->query($sql) === FALSE) {
    echo "Error: " . $sql . "<br>" . $db->error;
  } 
}
?>