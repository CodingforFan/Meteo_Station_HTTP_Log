<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
	<title>Graf</title>
  <script src="./js.js"></script>
</head>
<body onload="myFunction()">
<?php 
include('./connect.php');

/*$sql = "IF NOT EXISTS (SELECT FROM meto_station VALUE 'id', 'date', 'humidity', 'temperature') 
        CREATE TABLE `$dbname'.'meto_station' ( 'id' INT NOT NULL AUTO_INCREMENT , 
                                           'date' DATE NOT NULL , 'humidity' INT NOT NULL , 
                                           'temperature' INT NOT NULL , PRIMARY KEY ('id') )
        END";
if ($db->query($sql) === FALSE) {
  echo "Error: " . $sql . "<br>" . $db->error;
}  */

if (isset($_GET['input']) && $_GET['input'] = 'true'){
  $date = date('Y.m.d H:i:s');
  $humidity = $_GET['humidity'];
  $temperature = $_GET['temperature'];
  $sql = "INSERT INTO meto_station VALUES ('' ,'$date', '$humidity', '$temperature');";
  if ($db->query($sql) === FALSE) {
    echo "Error: " . $sql . "<br>" . $db->error;
  } 
}
?>
<div class="graf">
<?php
$result = $db->query("SELECT id, date, humidity, temperature FROM meto_station;");
if ($result->num_rows > 0) { 
  echo '<div class="posuv">';
  while($row = $result->fetch_assoc()) 
  {      
    echo '<div class="sloupec" name="sloupce" value="'.$row['temperature'].'" data-toggle="tooltip" title="'.$row['date'].'"></div>';
  }
  echo '</div>';
} else {
  echo "0 results";
}
?>
</div>
</body>
</html>

