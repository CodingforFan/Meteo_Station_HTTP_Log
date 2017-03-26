<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="style.css">
	<title>Meteostanice SoseCop</title>
  <script src="./js.js"></script>
</head>
<header>
   <h1>Meteostanice SoseCop:</h1>
</header>
<body onload="myFunction()">
<?php 
include('./connect.php');

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
<div>
  <p><b>Škola: </b>Soše Cop Hluboká nad Vltavou</p>
  <p><b>Tým: </b>Core-Bit</p>
  <p><b>Členové:</b>
  <p> - Vedoucí týmu: Jan Krejsa</p>
  <p> - 1.člen týmu: Marek Uhlík</p>
  <p> - 2.člen týmu: Filip Kotrba</p>
  <p> - 3.člen týmu: Václav Španinger</p>
  </p>
</div>
<div class="graf">
<?php
$result = $db->query("SELECT date, temperature FROM meto_station;");
if ($result->num_rows > 0) { 
  echo '<label><b>Teplota:</b></label>';
  echo '<div class="posuv">';
  while($row = $result->fetch_assoc()) 
  {      
    echo '<div class="sloupec" name="sloupce" value="'.$row['temperature'].'" data-toggle="tooltip" title="['.$row['date'].']['.$row['temperature'].'°C]"></div>';
  }
  echo '</div>';
} else { 
  echo '<div class="nothing"><b>Teplota:</b> 0 results</div>';
}
?>
<?php
$result = $db->query("SELECT date, humidity FROM meto_station;");
if ($result->num_rows > 0) {
  echo '<label><b>Vlhkost:</b></label>'; 
  echo '<div class="posuv">';
  while($row = $result->fetch_assoc()) 
  {      
    echo '<div class="sloupec" name="sloupce" value="'.$row['humidity'].'" data-toggle="tooltip" title="['.$row['date'].']['.$row['humidity'].'H2O]"></div>';
  }
  echo '</div>';
} else {
  echo '<div class="nothing"><b>Vlhkost:</b> 0 results</div>';
}
?>
</div>
<p>Copyright © Core-Bit</p>
</body>
</html>