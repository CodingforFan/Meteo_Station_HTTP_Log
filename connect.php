<?php
    include('config.php'); 
    $db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($db ->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 
?>