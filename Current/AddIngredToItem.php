<html>
<head>
<title>Add Ingredient to Menu Item</title>
</head>
<body>
<form action="http://localhost/SER322/project/current/IngredAddedToItem.php" method="post">

<b>Add Ingredient to Menu Item</b>

<p>Menu Item:
<select name="item">
<?php
require_once('../../../mysqli_connect.php');

$sql = mysqli_query($dbc, "SELECT Name, Size, ItemID FROM MenuItem");
while ($row = $sql->fetch_assoc()){
	$temp = $row['Size'] . " " . $row['Name'];
	echo "<option value=\"" . $row['ItemID'] . "\">" . $row['Size'] . " " . $row['Name'] . "</option>";
}
?>
</select>
</p>

<p>Ingredient:
<select name="ingredient">
<?php
require_once('mysqli_connect.php');

$sql = mysqli_query($dbc, "SELECT Name FROM Ingredient");
while ($row = $sql->fetch_assoc()){
	echo "<option value=\"" . $row['Name'] . "\">" . $row['Name'] . "</option>";
}
?>
</select>
Quantity: 
<input type="text" name="quantity" size="30" value="" />
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