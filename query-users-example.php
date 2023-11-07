<?php

//update connection information with your MySQL database information
$dbhost ="localhost";
$dbuser="xxxx";
$dbpass="xxxx";
$dbname = "xxxx";

//Connect to MySQL Server with selected Database
$mysqli = new mysqli($dbhost ,$dbuser ,$dbpass ,$dbname );

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

//build query
$query = "SELECT * FROM wp_users";

//Build Result String
$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th>display_name</th>";
$display_string .= "<th>user_url</th>";
$display_string .= "<th>user_registered</th>";
$display_string .= "</tr>";

// Perform query
if ($qry_result = $mysqli -> query("SELECT * FROM wp_users")) {
  echo "Returned rows are: " . $qry_result -> num_rows;
  while($row = mysqli_fetch_array($qry_result, MYSQLI_ASSOC)){
    $display_string .= "<tr>";
    $display_string .= "<td>$row[display_name]</td>";
    $display_string .= "<td>$row[user_url]</td>";
    $display_string .= "<td>$row[user_registered]</td>";
    $display_string .= "</tr>";
  }
  // Free result set
  $qry_result -> free_result();
}

echo "<br />Query: " . $query . "<br /><br />";
$display_string .= "</table>";
echo $display_string;

$mysqli -> close();
