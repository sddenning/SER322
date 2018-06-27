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
    
    if(empty($_POST['status'])){

        // Adds name to array
        $status1 = 'Placed';

    } else {

        // Trim white space from the name and store the name
        $status1 = trim($_POST['status']);
    }
    
    if(empty($data_missing)){
        
        require_once('../../../mysqli_connect.php');
                
        $query = "UPDATE CustOrder
        		  SET Status = '" . $status1 . "'" . 
        	    " WHERE OrderID = " . $order;
        			        			
        $sql = mysqli_query($dbc, $query);
                
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
                        
        if(mysqli_affected_rows($dbc) > 0){
        	           
            echo 'Status Changed';
                        
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
            echo 'If no errors printed, the status did not change. <br/>';
            
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