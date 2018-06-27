<html>
<head>
<title>Item Added To Order</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['orderno'])){

        // Adds name to array
        $data_missing[] = 'Order Number';

    } else {

        $order = $_POST['orderno'];
    }
    
    if(empty($_POST['item'])){

        // Adds name to array
        $data_missing[] = 'Item';

    } else {

        // Trim white space from the name and store the name
        $itemid = trim($_POST['item']);
    }

	if(empty($_POST['quantity'])){

        // Adds name to array
        $quant = 1;

    } else {

        // Trim white space from the name and store the name
        $quant = trim($_POST['quantity']);
    }


	if(empty($_POST['notes'])){

        // Adds name to array
        $note = NULL;

    } else {

        // Trim white space from the name and store the name
        $note = trim($_POST['notes']);
    }
    
    if(empty($data_missing)){
        
        require_once('mysqli_connect.php');
                
        $query = "INSERT INTO Contains (`OrderID`, `ItemID`, `Quantity`, `Notes`)
        	VALUES (?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
        
        mysqli_stmt_bind_param($stmt, "iiis", $order, $itemid, $quant, $note);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        

        
        if($affected_rows == 1){
            
        	$query = "SELECT Cost FROM MenuItem WHERE ItemID = " . $itemid;
        	        
        	$sql = mysqli_query($dbc, $query);
        	
        	$temp = $sql->fetch_assoc();
        	
        	$price = $temp['Cost'];
        	
        	$query = "UPDATE CustOrder
        			  SET SubTotal = SubTotal + " . ($price * $quant) . 
        			" WHERE OrderID = " . $order;
            			
        	$sql = mysqli_query($dbc, $query);
        	           
            echo 'Item Entered';
            
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
<a href="AddItemToOrder.php">Add More Items</a>
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