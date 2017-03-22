<?php 
include('./connect.php');

$sql = "IF NOT EXISTS (SELECT FROM meto_station VALUE 'id', 'date', 'humidity', 'temperature') 
        CREATE TABLE `$dbname'.'meto_station' ( 'id' INT NOT NULL AUTO_INCREMENT , 
                                           'date' DATE NOT NULL , 'humidity' INT NOT NULL , 
                                           'temperature' INT NOT NULL , PRIMARY KEY ('id') )
        END";
if ($db->query($sql) === FALSE) {
  echo "Error: " . $sql . "<br>" . $db->error;
} 

if (isset($_GET['input']) && $_GET['input'] = 'true'){
  $date = date('Y.m.d H:i:s');
  $humidity = $_GET['humidity'];
  $temperature = $_GET['temperature'];
  $sql = "INSERT INTO meto_station VALUES '' ,$date', '$humidity', '$temperature';";
  if ($db->query($sql) === FALSE) {
    echo "Error: " . $sql . "<br>" . $db->error;
  } 
}

$sql = "SELECT FROM meto_station VALUE 'id', 'date', 'humidity', 'temperature' ORDER BY date ASC ";
$result = $db->query($sql);
if ($result->num_rows > 0) { 
  while($row = $result->fetch_assoc()) 
  {
    echo $row['id'] $row['date'] $row['humidity'] $row['temperature'];    
  }
} else {
  echo "0 results";
}
?>
