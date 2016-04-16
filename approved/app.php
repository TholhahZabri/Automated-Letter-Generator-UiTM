<?php

require_once('../auth.php');
$alevel = ($_SESSION['SESS_MEMBER_LEVEL']);

$title = "Approved Appointment Letter";
include '../template/inbox_header.php';


if($alevel == 1)
{
	

	echo "

	<h1>Approved Appointment Letter</h1><br>
	<table class='resulttable'>
	<tr>
	<th> Sender </th><th> Receiver </th><th> Event Name </th><th> Date </th>
	</tr>
	";
	$userid = ($_SESSION['SESS_MEMBER_ID']);

	include '../db_info.php';
		
				
			try
			{
				//connect to db
				$conn = new PDO("mysql:host=$servername;dbname=$dbname" , $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				//sql query
				$stmt = $conn->prepare("SELECT * FROM letter_appointment WHERE APPROVE_STAT = '1' ");

				//execute query
				$stmt->execute();
				
				//fetch
				while($result = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					$ev_name = $result['ev_name'];
					$date = $result['tarikh'];
					$sender = $result['sender'];
					$receiver = $result['receiver'];
					$lett_id = $result['lett_id'];
					
					echo"
					<tr>
					<td> {$sender} </td>
					<td> {$receiver} </td>
					<td><a href='./preview.php?lett_id={$lett_id}&type=app' target='_blank'>{$ev_name}</a> </td>
					<td> {$date} </td>
					</tr>
					
					
					";				
				}
				
			}
			catch(PDOException $e)
			{
				echo "Connection failed : " . $e->getMessage();
			}

			$conn = null;

	echo "</table><br><br>";

}
if($alevel == 2)
{
	echo "<script>alert('You have no privilaged to view this page!')</script>";
	echo "<script>goBack()</script>";
}


include '../template/inbox_footer.php';
?>