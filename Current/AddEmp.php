<html>
<head>
<title>Add Employee</title>
</head>
<body>
<form action="http://localhost/SER322/project/current/EmpAdded.php" method="post">

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