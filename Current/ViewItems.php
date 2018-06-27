<?php
 
// Get a connection for the database
require_once('mysqli_connect.php');

// Create a query for the database
$query = "SELECT ItemID, Name, Size, Cost, AgeRestriction FROM MenuItem";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>Item ID</b></td>
<td align="left"><b>Name</b></td>
<td align="left"><b>Size</b></td>
<td align="left"><b>Cost</b></td>
<td align="left"><b>Age Restriction?</b></td>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['ItemID'] . '</td><td align="left">' . 
$row['Name'] . '</td><td align="left">' .
$row['Size'] . '</td><td align="left">' . 
$row['Cost'] . '</td><td align="left">' .
$row['AgeRestriction'] . '</td><td align="left">';

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