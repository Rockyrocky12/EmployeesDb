<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$ID = $_GET['eid'];

//deleting the row from table
$sql = "DELETE FROM Employees WHERE eid=:eid";
$query = $dbConn->prepare($sql);
$query->execute(array(':eid' => $ID));

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>