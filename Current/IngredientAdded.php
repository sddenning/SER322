<html>
<head>
<title>Add Ingredient</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['name'])){

        // Adds name to array
        $data_missing[] = 'Ingredient Name';

    } else {

        // Trim white space from the name and store the name
        $name1 = trim($_POST['name']);

    }
    
    if(empty($_POST['supplier'])){

        // Adds name to array
        $data_missing[] = 'Supplier';

    } else {

        // Trim white space from the name and store the name
        $supplier1 = trim($_POST['supplier']);

    }
    
    if(empty($_POST['cost'])){

        // Adds name to array
        $data_missing[] = 'Cost';

    } else {

        // Trim white space from the name and store the name
        $cost1 = trim($_POST['cost']);

    }
    
    if(empty($_POST['inventory'])){

        // Adds name to array
        $data_missing[] = 'Inventory';

    } else {

        // Trim white space from the name and store the name
        $inventory1 = trim($_POST['inventory']);

    }
    
    if(empty($data_missing)){
        
        require_once('mysqli_connect.php');
        
        $query = "INSERT INTO Ingredient (`Name`, `Supplier`, `Cost`, `Inventory`)
        	VALUES (?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
        
        mysqli_stmt_bind_param($stmt, "ssdi", $name1, $supplier1,
                               $cost1, $inventory1);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Ingredient Entered';
            
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

<form action="IngredientAdded.php" method="post">

<b>Add an Ingredient</b>

<p>Ingredient Name:
<input type="text" name="name" size="30" value="" />
</p>

<p>Supplier:
<input type="text" name="supplier" size="30" value="" />
</p>

<p>Cost:
<input type="text" name="cost" size="30" value="" />
</p>

<p>Inventory:
<input type="text" name="inventory" size="30" value="" />
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