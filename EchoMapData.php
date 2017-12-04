<?php
//Creates a connection to the MySQL server
$connection=mysqli_connect("localhost", "reachingout", "password", "reachingout");

if (!$connection) {
  die('Not connected : ' . mysqli_error($connection));
}

//Select all the rows from the markers table
$query = "SELECT * FROM markers WHERE 1";
$result = mysqli_query($connection, $query, $resultmode = MYSQLI_STORE_RESULT);
if (!$result) {
  die('Invalid query: ' . mysqli_error($connection));
}

header("Content-type: text/xml");

//Start XML file and echo parent node
echo '<markers>';

//Iterate through the rows and print XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  echo '<marker ';
  echo 'id="' . $row['id']. '" ';
  echo 'name="' . $row['name'] . '" ';
  echo 'address="' . $row['address'] . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'type="' . $row['type'] . '" ';
  echo '/>';
}

//End XML File
echo '</markers>';
?>

