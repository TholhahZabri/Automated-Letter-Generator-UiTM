<?php

require_once('../auth.php');

if(isset($_GET['ev_name']) && isset($_GET['type']))
{
	//$lett_id = $_GET['lett_id'];
	$ev_name2 = $_GET['ev_name'];
	$sender2 = $_GET['sender'];
	
	if($_GET['type'] == "appc") //check if letter type is appreciation letter
	{
		
		include '../db_info.php';
	
		
		try
		{
			//connect to db
			$conn = new PDO("mysql:host=$servername;dbname=$dbname" , $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//sql query
			$stmt = $conn->prepare("UPDATE letter_appreciation SET approve_stat = '1' WHERE ev_name = '{$ev_name2}' AND sender = '{$sender2}' ");

			//execute query
			$stmt->execute();
		
			echo "<script>alert('Letter Approved!')</script>";
			echo "<script>window.close();</script>";
			
			
		}
		catch(PDOException $e)
		{
			echo "Connection failed : " . $e->getMessage();
		}

		$conn = null;
	}
	else if($_GET['type'] == "app") //check if letter type is appointment letter
	{
		include '../db_info.php';
	
		
		try
		{
			//connect to db
			$conn = new PDO("mysql:host=$servername;dbname=$dbname" , $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//sql query
			$stmt = $conn->prepare("UPDATE letter_appointment SET approve_stat = '1' WHERE ev_name = '{$ev_name2}' AND sender = '{$sender2}' ");

			//execute query
			$stmt->execute();
			
			
			echo "<script>alert('Letter Approved!')</script>";
			echo "<script>window.close();</script>";
			
				
			
			
		}
		catch(PDOException $e)
		{
			echo "Connection failed : " . $e->getMessage();
		}

		$conn = null;
	}
		

}
?>