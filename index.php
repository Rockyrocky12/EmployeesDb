<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM Employees ORDER BY eid ");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>

		<td>ID</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Gender</td>
		<td>Department</td>
		<td>Date Employed</td>
		<td>Salary</td>

	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['eid']."</td>";
		echo "<td>".$row['eFirstName']."</td>";
		echo "<td>".$row['eLastName']."</td>";
		echo "<td>".$row['eGender']."</td>";
		echo "<td>".$row['eDepartment']."</td>";		
		echo "<td>".$row['eDateEmployed']."</td>";	
		echo "<td>".$row['eSalary']."</td>";	
		echo "<td><a href=\"edit.php?id=$row[eid]\">Edit</a> | <a href=\"delete.php?id=$row[eid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
