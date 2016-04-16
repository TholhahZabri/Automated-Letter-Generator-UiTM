<?php

//Start session
session_start();	
//Unset the variables stored in session
unset($_SESSION['SESS_MEMBER_ID']);
unset($_SESSION['SESS_MEMBER_PASS']);
unset($_SESSION['SESS_MEMBER_LEVEL']);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Page</title>
</head>
<body>
	<br><br>
	<center>
	<img src="template/img/uitm_logo.png" alt="Logo UiTM" style="width:304px" ><br><br><br>
    <style>
	div
	{
		width:400px;
		border:solid black;
	}
	</style>
    <div>
    <h1> Letter System </h1>
    <form name="login_form" action="index.php" method="post">
    Staff ID : <input name="user" type="text" autofocus required="required"><br><br>
    Password :  <input name="pass" type="password" autofocus required="required"><br><br>
    <input type="submit" value="Login">    
	<br><br>
	
	 
	<?php

	include 'db_info.php';

	if(isset($_POST["user"]) && isset($_POST["pass"]))
	{
			
		$id = $_POST["user"];
		$pass = $_POST["pass"];	
			
		try
		{
			//connect to db
			$conn = new PDO("mysql:host=$servername;dbname=$dbname" , $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//sql query
			$stmt = $conn->prepare("SELECT STAFF_ID, PASSWORD, ACCESS_LEVEL, NAME FROM USER");

			//execute query
			$stmt->execute();
			
			//fetch
			while($result = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				//store fetched data into variable
				$i = $result['STAFF_ID'];
				$p = $result['PASSWORD'];
				$l = $result['ACCESS_LEVEL'];
				$n = $result['NAME'];
				
				if($id == $i && $pass == $p)
				{
					session_regenerate_id();
					$_SESSION['SESS_MEMBER_ID'] = $i;
					$_SESSION['SESS_MEMBER_PASS'] = $p;
					$_SESSION['SESS_MEMBER_LEVEL'] = $l;
					$_SESSION['SESS_MEMBER_NAME'] = $n;
					session_write_close();
					header("location: home.php");
					exit();
				}
				else
				{
					$err = "Wrong username/password!";
				}
			}
			
			
			if(isset($err))
			{
				echo "<center><font color='red'><p>$err</p></font></center>";
			}
			
		}
		catch(PDOException $e)
		{
			echo "Connection failed : " . $e->getMessage();
		}

		$conn = null;
	}


	
	
	?>
	
	
	
    </form>
    
    Didn't have an account ? <a href="registration.php">Register</a><br><br><br></center><br/>
	<br/><br/><br/><br/>
</body>
</html>

