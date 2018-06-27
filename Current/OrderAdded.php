<html>
<head>
<title>Order Created</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['customer'])){

        // Adds name to array
        $data_missing[] = 'Customer';

    } else {

        $cust = $_POST['customer'];
    }

	if(empty($_POST['server'])){

        // Adds name to array
        $data_missing[] = 'Server';

    } else {
		
        $emp = $_POST['server'];
    }
    
    if(empty($data_missing)){
        
        require_once('../../../mysqli_connect.php');
                
        $query = "INSERT INTO CustOrder (`OrderID`, `CustomerID`, `EmpID`)
        	VALUES (NULL, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        echo mysqli_error($dbc) . "<br/>";
        
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
        
        mysqli_stmt_bind_param($stmt, "ii", $cust, $emp);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
                    
            echo 'Order Entered';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}

?>

<p>
<a href="AddItemToOrder.php">Add Item to Order</a>
</p>

<p>
<a href="AddOrder.php">Create New Order</a>
</p>

<p>
<a href="OrderHome.html">Order Home</a>
</p>

<p>
<a href="home.html">Home</a>
</p>
    
</body>
</html>