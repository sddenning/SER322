<html>
<head>
<title>Add Menu Item</title>
</head>
<body>
<form action="http://localhost/SER322/project/current/ItemAdded.php" method="post">

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