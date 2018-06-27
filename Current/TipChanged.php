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
    
    if(empty($_POST['tip'])){

        // Adds name to array
        $tip1 = 0;

    } else {

        // Trim white space from the name and store the name
        $tip1 = trim($_POST['tip']);
    }
    
    if(empty($data_missing)){
        
        require_once('mysqli_connect.php');
                
        $query = "UPDATE CustOrder
        		  SET Tip = " . $tip1 . 
        	    " WHERE OrderID = " . $order;
        			        			
        $sql = mysqli_query($dbc, $query);
                
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
                        
        if(mysqli_affected_rows($dbc) > 0){
            
        	$query = "SELECT EmpID FROM CustOrder WHERE OrderID = " . $order;
        	        
        	$sql = mysqli_query($dbc, $query);
        	
        	$temp = $sql->fetch_assoc();
        	
        	$emp = $temp['EmpID'];
        	
        	$query = "UPDATE Server
        			  SET Tips = Tips + " . $tip1 . 
        			" WHERE EmpID = " . $emp;
        			        			
        	$sql = mysqli_query($dbc, $query);
        	           
            echo 'Tip Entered';
                        
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
            echo 'If no errors printed, the tip did not change. <br/>';
            
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
<a href="OrderHome.html">Order Home</a>
</p>

<p>
<a href="home.html">Home</a>
</p>
    
</body>
</html>