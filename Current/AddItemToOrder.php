<html>
<head>
<title>Add Item to Order</title>
</head>
<body>
<form action="ItemAddedToOrder.php" method="post">

<b>Add Ingredient to Menu Item</b>

<p>Order:
<select name="orderno">
<?php
require_once('mysqli_connect.php');

$sql = mysqli_query($dbc, "SELECT CustOrder.OrderID AS a, Customer.FirstName AS b,
								  Customer.LastName AS c, Customer.TableNo AS d
						   FROM CustOrder, Customer
						   WHERE CustOrder.Status != 'Closed' &&
						         CustOrder.CustomerID = Customer.CustomerID
						   ORDER BY CustOrder.OrderID DESC");
while ($row = $sql->fetch_assoc()){
	$temp = $row['a'] . " :: " . $row['b'] . " " . $row['c'] . ":: Table " . $row['d'];
	echo "<option value=\"" . $row['a'] . "\">" . $temp . "</option>";
}
?>
</select>
</p>

<p>Item:
<select name="item">
<?php
require_once('mysqli_connect.php');

$sql = mysqli_query($dbc, "SELECT Name, Size, ItemID FROM MenuItem");
while ($row = $sql->fetch_assoc()){
	$temp = $row['Size'] . " " . $row ['Name'];
	echo "<option value=\"" . $row['ItemID'] . "\">" . $temp . "</option>";
}
?>
</select>
Quantity: 
<input type="text" name="quantity" size="10" value="" />
</p>

<p>
Notes: 
<input type="text" name="notes" size="30" value="" />
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