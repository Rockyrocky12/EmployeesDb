<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$ID = $_POST['eid'];
	$FirstName=$_POST['eFirstName'];
	$LastName=$_POST['eLastName'];
	$Gender=$_POST['eGender'];
	$Department=$_POST['eDepartment'];	
	$DateEmployed=$_POST['eDateEmployed'];
	$Salary=$_POST['eSalary'];	
		
	

	
	// checking empty fields
	if(empty($ID) || empty($FirstName) || empty($LastName)|| empty($Gender)|| empty($Department)|| empty($DateEmployed)|| empty($Salary)) {	
			
		if(empty($ID)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($FirstName)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($LastName)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
		if(empty($Gender)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		if(empty($Department)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		if(empty($DateEmployed)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		if(empty($Salary)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}								
	} else {	
		//updating the table
		$sql = "UPDATE Employees SET eFirstName=:eFirstName, eLastName=:eLastName, eGender=:eGender, eDepartment=:eDepartment, eDateEmployed=:eDateEmployed, eSalary=:eSalary, WHERE eid=:eid";
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
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['eid'];

//selecting data associated with this particular id
$sql = "SELECT * FROM Employees WHERE eid=:eid";
$query = $dbConn->prepare($sql);
$query->execute(array(':eid' => $ID));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$ID = $row['eid'];
	$FirstName = $row['eFirstName'];
	$LastName = $row['eLastName'];
	$Gender = $row['eGender'];
	$Department = $row['eDepartment'];
	$DateEmployed = $row['eDateEmployed'];
	$Salary = $row['eSalary'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>ID</td>
				<td><input type="text" name="eid" value="<?php echo $ID;?>"></td>
			</tr>
			<tr> 
				<td>First Name</td>
				<td><input type="text" name="eFirstName" value="<?php echo $FirstName;?>"></td>
			</tr>
			<tr> 
				<td>Last Name</td>
				<td><input type="text" name="eLastName" value="<?php echo $LastName;?>"></td>
			</tr>
			<tr> 
				<td>Gender</td>
				<td><input type="text" name="eGender" value="<?php echo $Gender;?>"></td>
			</tr>
			<tr> 
				<td>Department</td>
				<td><input type="text" name="eDepartment" value="<?php echo $Department;?>"></td>
			</tr>
			<tr> 
				<td>Date Employed</td>
				<td><input type="text" name="eDateEmployed" value="<?php echo $DateEmployed;?>"></td>
			</tr>
			<tr> 
				<td>Salary</td>
				<td><input type="text" name="eSalary" value="<?php echo $Salary;?>"></td>
			</tr>
			
			
			<tr>
				<td><input type="hidden" name="eid" value=<?php echo $_GET['eid'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
