<html>
<head>
<title>Create Order</title>
</head>
<body>
<form action="http://localhost/SER322/project/current/OrderAdded.php" method="post">

<b>Create Order</b>

<p>Customer:
<select name="customer">
<?php
require_once('../../../mysqli_connect.php');

$sql = mysqli_query($dbc, "SELECT FirstName, LastName, email, CustomerID FROM Customer");
while ($row = $sql->fetch_assoc()){
	$temp = $row['FirstName'] . " " . $row['LastName'] . ": " . $row['email'];
	echo "<option value=\"" . $row['CustomerID'] . "\">" . $temp . "</option>";
}
?>
</select>
</p>

<p>Server:
<select name="server">
<?php
require_once('../../../mysqli_connect.php');

$sql = mysqli_query($dbc, "SELECT EmpID FROM Server");
while ($row = $sql->fetch_assoc()){
	echo "<option value=\"" . $row['EmpID'] . "\">" . $row['EmpID'] . "</option>";
}
?>
</select>

<p>
<input type="submit" name="submit" value="Send" />
</p>

<p>
<a href="home.html">Home</a>
</p>

</form>
</body>
</html>