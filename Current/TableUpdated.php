<html>
<head>
<title>Table Updated</title>
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
    
    if(empty($_POST['table'])){

        // Adds name to array
        $data_missing[] = 'Table';

    } else {

        // Trim white space from the name and store the name
        $table1 = trim($_POST['table']);
    }
    
    if(empty($data_missing)){
        
        require_once('../../../mysqli_connect.php');
                
        $query = "UPDATE Customer
        		  SET TableNo = " . $table1 . 
        	    " WHERE CustomerID = " . $cust;
        	    
        echo $query . "<br/>";
        			        			
        $sql = mysqli_query($dbc, $query);
                
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
                        
        if(mysqli_affected_rows($dbc) > 0){
        	           
            echo 'Table Updated';
                        
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
            echo 'If no errors printed, the table did not change. <br/>';
            
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