<?php
//Gets data from URL parameters
$name = (!empty($_GET['name']) ? $_GET['name'] : null);
//$name = $_GET['name'];
$address = (!empty($_GET['name']) ? $_GET['name'] : null);
//$address = $_GET['address'];
$lat = (!empty($_GET['name']) ? $_GET['name'] : null);
//$lat = $_GET['lat'];
$lng = (!empty($_GET['name']) ? $_GET['name'] : null);
//$lng = $_GET['lng'];
$type = (!empty($_GET['name']) ? $_GET['name'] : null);
//$type = $_GET['type'];

//Connects to the MySQL server
$connection=mysqli_connect("localhost", "reachingout", "password", "reachingout");

if(!$connection)
{
	die('Not connected: ' . mysqli_error($connection));
}

//Inserts new row with location information
$query = sprintf("INSERT INTO markers " 
         . " (id, name, address, lat, lng, type ) " 
         . " VALUES (NULL, '%s', '%s', '%s', '%s', '%s');",
         mysqli_real_escape_string($connection, $name),
         mysqli_real_escape_string($connection, $address),
         mysqli_real_escape_string($connection, $lat),
         mysqli_real_escape_string($connection, $lng),
         mysqli_real_escape_string($connection, $type));
		 
$result = mysqli_query($connection, $query, $resultmode = MYSQLI_STORE_RESULT);

if(!$result)
{
	die('Invalid query: ' . mysqli_error($connection));
}
?>



