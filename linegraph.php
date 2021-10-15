<?php 

include('function/db.php');
//query to get data from the table
$query = sprintf("SELECT id,match_score FROM attendance");

//execute query
$result = $con->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}


print json_encode($data);


?>