<html>
<head>
<title>Add Employee</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['first_name'])){

        // Adds name to array
        $data_missing[] = 'First Name';

    } else {

        // Trim white space from the name and store the name
        $f_name = trim($_POST['first_name']);

    }

    if(empty($_POST['last_name'])){

        // Adds name to array
        $data_missing[] = 'Last Name';

    } else{

        // Trim white space from the name and store the name
        $l_name = trim($_POST['last_name']);

    }
    
    if(empty($_POST['SSN'])){

        // Adds name to array
        $data_missing[] = 'SSN';

    } else{

        // Trim white space from the name and store the name
        $ssn1 = trim($_POST['SSN']);

    }
    
    if(empty($_POST['wages'])){

        // Adds name to array
        $data_missing[] = 'Wages';

    } else{

        // Trim white space from the name and store the name
        $wages1 = trim($_POST['wages']);

    }
    
    if(empty($_POST['tips'])){

        // Adds name to array
        //$data_missing[] = 'Tips';
        $tips1 = 0;

    } else{

        // Trim white space from the name and store the name
        $tips1 = trim($_POST['tips']);

    }
    
    if(empty($data_missing)){
        
        require_once('mysqli_connect.php');
        
        $query = "INSERT INTO Server (`EmpID`, `FirstName`, `LastName`, `SSN`,
        	`Wages`, `Tips`) VALUES (NULL, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
        
        mysqli_stmt_bind_param($stmt, "sssdd", $f_name, $l_name, $ssn1, $wages1, $tips1);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Employee Entered';
            
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

<form action="EmpAdded.php" method="post">

<b>Add a New Employee</b>

<p>First Name:
<input type="text" name="first_name" size="30" value="" />
</p>

<p>Last Name:
<input type="text" name="last_name" size="30" value="" />
</p>

<p>SSN:
<input type="text" name="SSN" size="30" maxlength="11" value="" />
</p>

<p>Wages: $
<input type="text" name="wages" size="30" value="" />
</p>

<p>Tips: $
<input type="text" name="tips" size="30" value="" />
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