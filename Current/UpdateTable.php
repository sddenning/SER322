<html>
<head>
<title>Update Table Number</title>
</head>
<body>
<form action="TableUpdated.php" method="post">

<b>Update Table</b>

<p>Customer:
<select name="customer">
<?php
require_once('mysqli_connect.php');

$sql = mysqli_query($dbc, "SELECT FirstName, LastName, email, CustomerID FROM Customer");
while ($row = $sql->fetch_assoc()){
	$temp = $row['FirstName'] . " " . $row['LastName'] . ": " . $row['email'];
	echo "<option value=\"" . $row['CustomerID'] . "\">" . $temp . "</option>";
}
?>
</select>
</p>

<p>Table Number:
<input type="text" name="table" size="10" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>

<p>
<a href="home.html">Home</a>
</p>

</form>
</body>
</html>