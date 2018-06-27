<html>
<head>
<title>Add Ingredient to Item</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['item'])){

        // Adds name to array
        $data_missing[] = 'Menu Item';

    } else {

        $itemid = $_POST['item'];
    }
    
    if(empty($_POST['ingredient'])){

        // Adds name to array
        $data_missing[] = 'Ingredient';

    } else {

        // Trim white space from the name and store the name
        $ingred = trim($_POST['ingredient']);
    }

	if(empty($_POST['quantity'])){

        // Adds name to array
        $data_missing[] = 'Quantity';

    } else {

        // Trim white space from the name and store the name
        $quant = trim($_POST['quantity']);
    }

    
    if(empty($data_missing)){
        
        require_once('../../../mysqli_connect.php');
                
        $query = "INSERT INTO Requires (`ItemID`, `Name`, `Quantity`)
        	VALUES (?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
        
        mysqli_stmt_bind_param($stmt, "isi", $itemid, $ingred, $quant);
        
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

<p>
<a href="AddIngredToItem.php">Add More Ingredients</a>
</p>

<p>
<a href="home.html">Home</a>
</p>
    
</body>
</html>