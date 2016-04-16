<html>
<head>
<meta charset="utf-8">
<title>Registration Page</title>
</head>

<body>
	
	<center>
	<br><br><img src="template/img/uitm_logo.png" alt="Logo UiTM" style="width:304px" ><br><br><br>
	<style>
	div
	{
		width:400px;
		border:solid black;
	}
	</style>
	<div>
	<h1>Registration Page</h1>
	<form name = "registration">
 
    <br/>
    Staff ID : <br/><input name="staff_id" type="text" required="required"><br/><br/>
	Password : <br/> <input name="pass" type="password" required="required"><br/><br/>
    Name : <br/><input name="name" type="text" required="required"><br/><br/>
    Faculty : <br/><input name="faculty" type="text" required="required"><br/><br/>
    E-Mail : <br/><input name="email" type="text" required="required"><br/><br/>
    <input type="submit" value="Register"><br/><br/>
	Already have an account ? <a href="index.php">Login</a><br><br><br>
    </center>
	</div>
    </form>
    
	<br/><br/><br/><br/>
</body>
</html>

<?php 
include 'db_info.php';
if(isset($_GET["staff_id"]) && isset($_GET["pass"]) && isset($_GET["name"]) && isset($_GET["faculty"]) && isset($_GET["email"]))
{
	
	$staff_id = (isset($_GET["staff_id"]) ? $_GET["staff_id"] : null);
	$pass = (isset($_GET["pass"]) ? $_GET["pass"] : null);
	$name = (isset($_GET["name"]) ? $_GET["name"] : null);
	$faculty = (isset($_GET["faculty"]) ? $_GET["faculty"] : null);
	$email = (isset($_GET["email"]) ? $_GET["email"] : null);
	
	//default access level
	$access = 2;
	
	try
	{
		//connect to database
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//insert data into db
		$stmt = $conn->prepare("INSERT INTO USER (Staff_ID,Password,Access_level,Name,Faculty,Email) VALUES('{$staff_id}' , '{$pass}' , '{$access}' ,'{$name}' , '{$faculty}' , '{$email}');");
		
		//execute sql query
		$stmt->execute();
		
		echo "<script>alert('You have registered successfully !')</script>";
		
	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}


	//close conection
	$conn = null;
}

?>