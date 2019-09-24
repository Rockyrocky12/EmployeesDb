<html>
<head>
	<title>Add Data</title>
</head>

<body>

<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$ID = $_POST['eid'];
	$FirstName = $_POST['eFirstName'];
	$LastName = $_POST['eLastName'];
	$Gender = $_POST['eGender'];
	$Department = $_POST['eDepartment'];
	$DateEmployed = $_POST['eDateEmployed'];
	$Salary = $_POST['eSalary'];

		
	// checking empty fields
	if(empty($ID) || empty($FirstName) || empty($LastName)|| empty($Gender)|| empty($Department)|| empty($Department)|| empty($DateEmployed)|| empty($Salary)) {
				
		if(empty($ID)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($FirstName)) {
			echo "<font color='red'>field is empty.</font><br/>";
		}
		
		if(empty($LastName)) {
			echo "<font color='red'>field is empty.</font><br/>";
		}
		if(empty($Gender)) {
			echo "<font color='red'>field is empty.</font><br/>";
		}
		if(empty($Department)) {
			echo "<font color='red'>field is empty.</font><br/>";
		}
		if(empty($DateEmployed)) {
			echo "<font color='red'> field is empty.</font><br/>";
		}
		if(empty($Salary)) {
			echo "<font color='red'>field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO Employees(eid, eFirstName, eGender, eDepartment, eDateEmployed, eSalary) VALUES(:eid, :eFirstName, :eGender, :eDepartment, :eDateEmployed, :eSalary)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':eid', $ID);
		$query->bindparam(':eFirstName', $FirstName);
		$query->bindparam(':eLastName', $LastName);
		$query->bindparam(':eGender', $Gender);
		$query->bindparam(':eDepartment', $Department);
		$query->bindparam(':eDateEmployed', $DateEmployed);
		$query->bindparam(':eSalary', $Salary);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
