<?php
 
// Get a connection for the database
require_once('../../../mysqli_connect.php');

// Create a query for the database
$query = "SELECT OrderID, Tip, TimePlaced, Status, SubTotal,
		         CustOrder.CustomerID, CustOrder.EmpID,
		         Customer.CustomerID, Server.EmpID, Customer.FirstName AS cfn,
		         Customer.LastName AS cln, Server.FirstName AS sfn, Server.LastName AS sln
		  FROM CustOrder, Server, Customer
		  WHERE Server.EmpID = CustOrder.EmpID &&
		        CustOrder.CustomerID = Customer.CustomerID";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>Order ID</b></td>
<td align="left"><b>Time Placed</b></td>
<td align="left"><b>Status</b></td>
<td align="left"><b>Server</b></td>
<td align="left"><b>Customer</b></td>
<td align="left"><b>Subtotal</b></td>
<td align="left"><b>Tax</b></td>
<td align="left"><b>Tip</b></td>
<td align="left"><b>Total</b></td>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['OrderID'] . '</td><td align="left">' . 
$row['TimePlaced'] . '</td><td align="left">' .
$row['Status'] . '</td><td align="left">' . 
$row['sfn'] . " " .  $row['sln'] . '</td><td align="left">' . 
$row['cfn'] . " " .  $row['cln'] . '</td><td align="left">' . 
$row['SubTotal'] . '</td><td align="left">' . 
($row['SubTotal'] * 0.06) . '</td><td align="left">' . 
$row['Tip'] . '</td><td align="left">' . 
($row['SubTotal'] * 1.06 + $row['CustOrder.Tip']) . '</td><td align="left">';

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);

?>