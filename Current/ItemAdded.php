<html>
<head>
<title>Add Menu Item</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['name'])){

        // Adds name to array
        $data_missing[] = 'Name';

    } else {

        // Trim white space from the name and store the name
        $name1 = trim($_POST['name']);

    }
    
    if(empty($_POST['size'])){

        // Adds name to array
        $data_missing[] = 'Size';

    } else {

        // Trim white space from the name and store the name
        $size1 = trim($_POST['size']);

    }
    
    if(empty($_POST['cost'])){

        // Adds name to array
        $data_missing[] = 'Cost';

    } else {

        // Trim white space from the name and store the name
        $cost1 = trim($_POST['cost']);

    }
    
    if(empty($_POST['ar'])){

        // Adds name to array
        $data_missing[] = 'Age Restriction';

    } else {

        // Trim white space from the name and store the name
        $ar1 = trim($_POST['ar']);

    }
    
    if(empty($data_missing)){
        
        require_once('mysqli_connect.php');
        
        $query = "INSERT INTO MenuItem (`ItemID`, `Name`, `Size`, `Cost`,
        	`AgeRestriction`) VALUES (NULL, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
        
        mysqli_stmt_bind_param($stmt, "ssds", $name1, $size1, $cost1, $ar1);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Menu Item Entered';
            
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

<form action="ItemAdded.php" method="post">

<b>Add a New Menu Item</b>

<p>Name:
<input type="text" name="name" size="30" value="" />
</p>

<p>Size: <br>
<input type="radio" name="size" value="Small"> Small <br>
<input type="radio" name="size" value="Medium"> Medium <br>
<input type="radio" name="size" value="Large"> Large
</p>

<p>Cost: $
<input type="text" name="cost" size="30" value="" />
</p>

<p>Age Restriction: <br>
<input type="radio" name="ar" value="Yes"> Yes <br>
<input type="radio" name="ar" value="No"> No
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