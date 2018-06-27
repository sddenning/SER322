<?php
 
// Get a connection for the database
require_once('../../../mysqli_connect.php');

// Create a query for the database
$query = "SELECT EmpID, FirstName, LastName, SSN, Wages, Tips FROM Server";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>EmpID</b></td>
<td align="left"><b>First Name</b></td>
<td align="left"><b>Last Name</b></td>
<td align="left"><b>SSN</b></td>
<td align="left"><b>Wages</b></td>
<td align="left"><b>Tips</b></td>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['EmpID'] . '</td><td align="left">' . 
$row['FirstName'] . '</td><td align="left">' .
$row['LastName'] . '</td><td align="left">' . 
$row['SSN'] . '</td><td align="left">' .
$row['Wages'] . '</td><td align="left">' . 
$row['Tips'] . '</td><td align="left">';

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