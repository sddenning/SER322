<html>
<head>
<title>Add Item to Order</title>
</head>
<body>
<form action="OrderStatusChanged.php" method="post">

<b>Add Ingredient to Menu Item</b>

<p>Menu Item:
<select name="orderno">
<?php
require_once('mysqli_connect.php');

$sql = mysqli_query($dbc, "SELECT CustOrder.OrderID AS a, Customer.FirstName AS b,
								  Customer.LastName AS c, Customer.TableNo AS d,
								  CustOrder.Status AS e
						   FROM CustOrder, Customer
						   WHERE CustOrder.Status != 'Closed' &&
						         CustOrder.CustomerID = Customer.CustomerID
						   ORDER BY CustOrder.OrderID ASC");
while ($row = $sql->fetch_assoc()){
	$temp = $row['a'] . " :: " . $row['b'] . " " . $row['c'] . ":: Table "
		    . $row['d'] . " :: " . $row['e'];
	echo "<option value=\"" . $row['a'] . "\">" . $temp . "</option>";
}
?>
</select>
</p>

<p>
Status:
<select name = "status">
	<option value="Placed">Placed</option>
	<option value="Ready">Ready</option>
	<option value="Served">Served</option>
	<option value="Closed">Closed</option>
</select>
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